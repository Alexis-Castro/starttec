<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Proyecto;
use MVC\Router;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
use Model\ProyectoGaleria;

class ProyectosController
{
   // Helper reutilizable para no repetir la creación del manager en cada método
   private static function imageManager(): ImageManager
   {
      return ImageManager::usingDriver(Driver::class);
   }

   public static function index(Router $router)
   {

      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/proyectos/listado?page=1');
      }

      $registros_por_pagina = 10;
      $total = Proyecto::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($paginacion->total_paginas() < $pagina_actual) {
         header('location: /admin/proyectos/listado?page=1');
      }

      $proyectos = Proyecto::paginar($registros_por_pagina, $paginacion->offset());

      $categorias = Categoria::all();

      $router->render('admin/proyectos/proyectos', [
         'titulo' => 'Panel de Proyectos',
         'proyectos' => $proyectos,
         'categorias' => $categorias,
         'paginacion' => $paginacion
      ]);
   }

   public static function crear(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }
      $alertas = [];
      $categorias = Categoria::all();

      $proyecto = new Proyecto;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }

         $manager = self::imageManager();

         // Leer imagen
         if (!empty($_FILES['imagen_previa']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/proyectos/imagen_previa';

            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            // v2: Image::make($tmp)->resize(800, null, fn($c) => $c->aspectRatio())
            // v4: decode() + scale() (scale ya mantiene el aspect ratio por defecto)
            $imagen_base = $manager->decode($_FILES['imagen_previa']['tmp_name'])
               ->scale(width: 800);

            $imagen_png  = $imagen_base->encodeUsingFormat(Format::PNG);
            $imagen_webp = $imagen_base->encodeUsingFormat(Format::WEBP, quality: 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen_previa'] = $nombre_imagen;
         }

         $proyecto->sincronizar($_POST);

         // Validar
         $alertas = $proyecto->validar();

         if (empty($alertas)) {

            if (isset($imagen_png, $imagen_webp)) {
               $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
               $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
            }

            $resultado = $proyecto->guardar();

            if ($resultado) {
               if (isset($_FILES['file']['tmp_name'])) {
                  $carpeta_imagenes_proyecto = '../public/img/proyectos/galeria';

                  $file_names = $_FILES['file']['name'];
                  $file_tmps = $_FILES['file']['tmp_name'];

                  if (!is_dir($carpeta_imagenes_proyecto)) {
                     mkdir($carpeta_imagenes_proyecto, 0755, true);
                  }

                  foreach ($file_names as $key => $name) {

                     $file_tmp = $file_tmps[$key];

                     $imagen_galeria = $manager->decode($file_tmp)
                        ->scale(width: 1920);

                     $imagen_png  = $imagen_galeria->encodeUsingFormat(Format::PNG);
                     $imagen_webp = $imagen_galeria->encodeUsingFormat(Format::WEBP, quality: 80);

                     $name = md5(uniqid(rand(), true));

                     $imagen_png->save($carpeta_imagenes_proyecto . '/' . $name . '.png');
                     $imagen_webp->save($carpeta_imagenes_proyecto . '/' . $name . '.webp');

                     $data = [
                        'imagen' => $name,
                        'proyecto_id' => (int) $resultado['id'],
                     ];

                     $proyecto_galeria = new ProyectoGaleria($data);
                     $proyecto_galeria->guardar();
                  }

                  header('Content-type: application/json');
                  echo json_encode([
                     'resultado' => $resultado,
                  ]);
               }
            } else {
               echo json_encode(['resultado' => false]);
            }
         } else {
            header('Content-type: application/json');
            echo json_encode($alertas['error']);
         }

         return;
      }

      $router->render('admin/proyectos/proyectos-crear', [
         'titulo' => 'Registrar Proyecto',
         'categorias' => $categorias,
         'proyecto' => $proyecto,
      ]);
   }

   public static function editar(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $alertas = [];

      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id) {
         header('Location: /admin/proyectos/listado');
      }

      $proyecto = Proyecto::find($id);
      $categoria = Categoria::all();

      if (!$proyecto) {
         header('Location: /admin/proyecto');
      }

      $proyecto->imagen_previa_actual = $proyecto->imagen_previa;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }

         $manager = self::imageManager();

         // Leer imagen
         if (!empty($_FILES['imagen_previa']['tmp_name'])) {
            $carpeta_imagenes = '../public/img/proyectos/imagen_previa';

            // Eliminar la imagen previa
            if ($proyecto->imagen_previa_actual) {
               if (file_exists($carpeta_imagenes . '/' . $proyecto->imagen_previa_actual . '.png')) {
                  unlink($carpeta_imagenes . '/' . $proyecto->imagen_previa_actual . '.png');
               }
               if (file_exists($carpeta_imagenes . '/' . $proyecto->imagen_previa_actual . '.webp')) {
                  unlink($carpeta_imagenes . '/' . $proyecto->imagen_previa_actual . '.webp');
               }
            }

            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_base = $manager->decode($_FILES['imagen_previa']['tmp_name'])
               ->scale(width: 800);

            $imagen_png  = $imagen_base->encodeUsingFormat(Format::PNG);
            $imagen_webp = $imagen_base->encodeUsingFormat(Format::WEBP, quality: 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen_previa'] = $nombre_imagen;
         } else {
            $_POST['imagen_previa'] = $proyecto->imagen_previa_actual;
         }

         $proyecto->sincronizar($_POST);

         $alertas = $proyecto->validar();

         if (empty($alertas)) {

            if (isset($nombre_imagen, $imagen_png, $imagen_webp)) {
               $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
               $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
            }

            $resultado = $proyecto->guardar();

            if ($resultado) {

               if (isset($_FILES['file']['tmp_name'])) {
                  $carpeta_imagenes_proyecto = '../public/img/proyectos/galeria';

                  $file_names = $_FILES['file']['name'];
                  $file_tmps = $_FILES['file']['tmp_name'];

                  if (!is_dir($carpeta_imagenes_proyecto)) {
                     mkdir($carpeta_imagenes_proyecto, 0755, true);
                  }

                  foreach ($file_names as $key => $name) {

                     $file_tmp = $file_tmps[$key];

                     $imagen_galeria = $manager->decode($file_tmp)
                        ->scale(width: 1920);

                     $imagen_png  = $imagen_galeria->encodeUsingFormat(Format::PNG);
                     $imagen_webp = $imagen_galeria->encodeUsingFormat(Format::WEBP, quality: 80);

                     $name = md5(uniqid(rand(), true));

                     $imagen_png->save($carpeta_imagenes_proyecto . '/' . $name . '.png');
                     $imagen_webp->save($carpeta_imagenes_proyecto . '/' . $name . '.webp');

                     $data = [
                        'imagen' => $name,
                        'proyecto_id' => (int) $proyecto->id,
                     ];

                     $proyecto_galeria = new ProyectoGaleria($data);
                     $proyecto_galeria->guardar();
                  }
               }

               header('Content-type: application/json');
               echo json_encode([
                  'resultado' => $resultado,
               ]);
            } else {
               echo json_encode(['resultado' => false]);
            }
         } else {
            header('Content-type: application/json');
            echo json_encode($alertas['error']);
         }

         return;
      }

      $router->render('admin/proyectos/proyectos-editar', [
         'titulo' => 'Editar Proyecto',
         'proyecto' => $proyecto,
         'categorias' => $categoria,
      ]);
   }

   public static function eliminar()
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = $_POST['id'];
         $proyecto = Proyecto::find($id);

         if (!isset($proyecto)) {
            echo json_encode(['resultado' => false]);
            return;
         }

         $carpeta_imagenes = '../public/img/proyectos/imagen_previa';
         if ($proyecto->imagen_previa) {
            if (file_exists($carpeta_imagenes . '/' . $proyecto->imagen_previa . '.png')) {
               unlink($carpeta_imagenes . '/' . $proyecto->imagen_previa . '.png');
            }
            if (file_exists($carpeta_imagenes . '/' . $proyecto->imagen_previa . '.webp')) {
               unlink($carpeta_imagenes . '/' . $proyecto->imagen_previa . '.webp');
            }
         }

         $galeria = ProyectoGaleria::where('proyecto_id', $proyecto->id);
         if ($galeria) {
            $galeria = is_array($galeria) ? $galeria : [$galeria];
            foreach ($galeria as $img) {
               if ($img->imagen) {
                  if (file_exists('../public/img/proyectos/galeria/' . $img->imagen . '.png')) {
                     unlink('../public/img/proyectos/galeria/' . $img->imagen . '.png');
                  }
                  if (file_exists('../public/img/proyectos/galeria/' . $img->imagen . '.webp')) {
                     unlink('../public/img/proyectos/galeria/' . $img->imagen . '.webp');
                  }
               }
            }
         }

         $resultado = $proyecto->eliminar();

         echo json_encode([
            'resultado' => $resultado,
         ]);
      }
   }

   public static function eliminarImg(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $id = $_POST['id'];
      $proyectoImgs = ProyectoGaleria::find($id);

      if (!isset($proyectoImgs)) {
         header('Location: /admin/proyecto');
      }

      if ($proyectoImgs->imagen) {
         $carpeta_imagenes = '../public/img/proyectos/galeria';
         unlink($carpeta_imagenes . '/' . $proyectoImgs->imagen . '.png');
         unlink($carpeta_imagenes . '/' . $proyectoImgs->imagen . '.webp');
      }

      $resultado = $proyectoImgs->eliminar();

      if ($resultado) {
         echo json_encode([
            'resultado' => $resultado,
         ]);
      } else {
         echo json_encode(['resultado' => false]);
      }
   }
}
