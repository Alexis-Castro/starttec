<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Proyecto;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\ProyectoGaleria;

class ProyectosController
{
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
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/proyectos/listado?page=1');
      }

      $proyectos = Proyecto::paginar($registros_por_pagina, $paginacion->offset());

      // debuguear($paginacion->offset() + 1);

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

      // debuguear($categorias);
      $proyecto = new Proyecto;


      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }
         // Leer imagen
         if (!empty($_FILES['imagen_previa']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/proyectos/imagen_previa';

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen_previa']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen_previa']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen_previa'] = $nombre_imagen;
         }

         $proyecto->sincronizar($_POST);

         // Validar
         $alertas = $proyecto->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar las imagenes
            $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
            $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

            // Guardar en la BD
            $resultado = $proyecto->guardar();

            if ($resultado) {
               // debuguear($resultado);
               if (isset($_FILES['file']["tmp_name"])) {
                  $carpeta_imagenes_proyecto = '../public/img/proyectos/galeria';

                  $file_names = $_FILES['file']['name'];
                  $file_tmps = $_FILES['file']['tmp_name'];

                  // Crear la carpeta si no existe
                  if (!is_dir($carpeta_imagenes_proyecto)) {
                     mkdir($carpeta_imagenes_proyecto, 0755, true);
                  }

                  foreach ($file_names as $key => $name) {

                     $file_tmp = $file_tmps[$key];

                     $imagen_png = Image::make($file_tmp)->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                     })->encode('png', 80);
                     $imagen_webp = Image::make($file_tmp)->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                     })->encode('webp', 80);

                     $name = md5(uniqid(rand(), true));

                     // $_POST['imagen_previa'] = $nombre_imagen;

                     // Guardar las imagenes
                     $imagen_png->save($carpeta_imagenes_proyecto . '/' . $name . ".png");
                     $imagen_webp->save($carpeta_imagenes_proyecto . '/' . $name . ".webp");

                     // $resultado_imgs = $proyecto->guardar();

                     $data = [
                        "imagen" => $name,
                        "proyecto_id" => (int) $resultado['id'],
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
               echo json_encode(["resultado" => false]);
            }
         } else {
            // header("HTTP/1.1 400 Bad Request");
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

      // Validar el ID
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id) {
         header('Location: /admin/proyectos/listado');
      }

      // Obtener proyecto a Editar
      $proyecto = Proyecto::find($id);
      $categoria = Categoria::all();

      if (!$proyecto) {
         header('Location: /admin/proyecto');
      }

      $proyecto->imagen_previa_actual = $proyecto->imagen_previa;
      // debuguear($proyecto);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }
         // Leer imagen
         if (!empty($_FILES['imagen_previa']['tmp_name'])) {
            // debuguear($_FILES);
            $carpeta_imagenes = '../public/img/proyectos/imagen_previa';

            // // Eliminar la imagen previa
            // unlink($carpeta_imagenes . '/' . $proyecto->imagen_previa_actual . ".png");
            // unlink($carpeta_imagenes . '/' . $proyecto->imagen_previa_actual . ".webp");

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen_previa']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen_previa']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen_previa'] = $nombre_imagen;
         } else {
            $_POST['imagen_previa'] = $proyecto->imagen_previa_actual;
         }

         $proyecto->sincronizar($_POST);
         // debuguear($proyecto);
         // debuguear($proyecto);
         // Validar
         $alertas = $proyecto->validar();

         // Guardar el registro
         if (empty($alertas)) {

            if (isset($nombre_imagen)) {
               $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
               $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
            }

            // Guardar en la BD
            $resultado = $proyecto->guardar();

            if ($resultado) {

               // debuguear($resultado);

               if (isset($_FILES['file']["tmp_name"])) {
                  // debuguear($_FILES);
                  $carpeta_imagenes_proyecto = '../public/img/proyectos/galeria';

                  $file_names = $_FILES['file']['name'];
                  $file_tmps = $_FILES['file']['tmp_name'];

                  // // Eliminar la imagen previa
                  // unlink($carpeta_imagenes_proyecto . '/' . $proyecto->imagen_previa_actual . ".png");
                  // unlink($carpeta_imagenes_proyecto . '/' . $proyecto->imagen_previa_actual . ".webp");

                  // Crear la carpeta si no existe
                  if (!is_dir($carpeta_imagenes_proyecto)) {
                     mkdir($carpeta_imagenes_proyecto, 0755, true);
                  }

                  foreach ($file_names as $key => $name) {

                     $file_tmp = $file_tmps[$key];

                     $imagen_png = Image::make($file_tmp)->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                     })->encode('png', 80);
                     $imagen_webp = Image::make($file_tmp)->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                     })->encode('webp', 80);

                     $name = md5(uniqid(rand(), true));

                     // $_POST['imagen_previa'] = $nombre_imagen;

                     // Guardar las imagenes
                     $imagen_png->save($carpeta_imagenes_proyecto . '/' . $name . ".png");
                     $imagen_webp->save($carpeta_imagenes_proyecto . '/' . $name . ".webp");

                     // $resultado_imgs = $proyecto->guardar();

                     $data = [
                        "imagen" => $name,
                        "proyecto_id" => (int) $proyecto->id,
                     ];

                     // debuguear($data);

                     $proyecto_galeria = new ProyectoGaleria($data);
                     $proyecto_galeria->guardar();
                  }

                  header('Content-type: application/json');
                  echo json_encode([
                     'resultado' => $resultado,
                  ]);
               }
            } else {
               echo json_encode(["resultado" => false]);
            }
         } else {
            // header("HTTP/1.1 400 Bad Request");
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

   public static function eliminarImg(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $id = $_POST['id'];
      $proyectoImgs = ProyectoGaleria::find($id);

      // debuguear($proyectoImgs);

      if (!isset($proyectoImgs)) {
         header('Location: /admin/proyecto');
      }

      if ($proyectoImgs->imagen) {
         $carpeta_imagenes = '../public/img/proyectos/galeria';
         unlink($carpeta_imagenes . '/' . $proyectoImgs->imagen . ".png");
         unlink($carpeta_imagenes . '/' . $proyectoImgs->imagen . ".webp");
      }

      $resultado = $proyectoImgs->eliminar();

      if ($resultado) {
         echo json_encode([
            'resultado' => $resultado,
         ]);
      } else {
         echo json_encode(["resultado" => false]);
      }
   }
}
