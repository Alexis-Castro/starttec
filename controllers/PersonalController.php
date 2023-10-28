<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Personal;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Cargo;

class PersonalController
{
   public static function index(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/personal?page=1');
      }

      $registros_por_pagina = 10;
      $total = Personal::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($total == 0) {
         // No hay registros en la base de datos, mostrar mensaje de error o redirigir a otra página
         header('Location: /admin/personal/crear');
      } else if ($paginacion->total_paginas() < $pagina_actual) {
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/personal?page=1');
      }

      $personal = Personal::paginar($registros_por_pagina, $paginacion->offset());

      // debuguear($paginacion->offset() + 1);

      $cargos = Cargo::all();

      $router->render('admin/personal/index', [
         'titulo' => 'Administrar Personal',
         'personal' => $personal,
         'cargos' => $cargos,
         'paginacion' => $paginacion
      ]);
   }

   public static function crear(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }
      $alertas = [];
      $cargos = Cargo::all();

      // debuguear($cargos);
      $personal = new Personal;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }
         // Leer imagen
         if (!empty($_FILES['imagen']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/personal';

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_imagen;
         }

         // Redes en json
         $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

         $personal->sincronizar($_POST);

         // Validar
         $alertas = $personal->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar las imagenes
            $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
            $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

            // Guardar en la BD
            $resultado = $personal->guardar();

            if ($resultado) {
               echo json_encode([
                  'resultado' => $resultado,
               ]);
            } else {
               echo json_encode(["resultado" => false]);
            }
         } else {
            echo json_encode($alertas['error']);
         }

         return;
      }

      $router->render('admin/personal/crear', [
         'titulo' => 'Registrar Personal',
         'cargos' => $cargos,
         'personal' => $personal,
         'redes' => json_decode($personal->redes)
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
         header('Location: /admin/personal');
      }

      // Obtener ponente a Editar
      $personal = Personal::find($id);
      $cargos = Cargo::all();

      if (!$personal) {
         header('Location: /admin/personal');
      }
      // debuguear($personal);


      $personal->imagen_actual = $personal->imagen;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }
         // Leer imagen

         if (!empty($_FILES['imagen']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/personal';

            // Eliminar la imagen previa
            unlink($carpeta_imagenes . '/' . $personal->imagen_actual . ".png");
            unlink($carpeta_imagenes . '/' . $personal->imagen_actual . ".webp");

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->resize(800, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_imagen;
         } else {

            $_POST['imagen'] = $personal->imagen_actual;
            // debuguear($_POST);
         }
         // debuguear('aqui1');

         $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

         $personal->sincronizar($_POST);

         $alertas = $personal->validar();

         if (empty($alertas)) {
            if (isset($nombre_imagen)) {
               $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
               $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
            }
            $resultado = $personal->guardar();

            if ($resultado) {
               echo json_encode([
                  'resultado' => $resultado,
               ]);
            } else {
               echo json_encode(["resultado" => false]);
            }
         } else {
            echo json_encode($alertas['error']);
         }

         return;
      }

      $router->render('admin/personal/editar', [
         'titulo' => 'Actualizar Personal',
         'alertas' => $alertas,
         'personal' => $personal ?? null,
         'cargos' => $cargos,
         'redes' => json_decode($personal->redes)
      ]);
   }

   public static function cargos(Router $router)
   {

      $router->render('admin/personal/cargos', [
         'titulo' => 'Cargos',
      ]);
   }

   public static function eliminar()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }

         $id = $_POST['id'];
         $personal = Personal::find($id);

         if (!isset($personal)) {
            header('Location: /admin/personal');
         }

         if ($personal->imagen) {
            $carpeta_imagenes = '../public/img/personal';
            unlink($carpeta_imagenes . '/' . $personal->imagen . ".png");
            unlink($carpeta_imagenes . '/' . $personal->imagen . ".webp");
         }

         $resultado = $personal->eliminar();

         if ($resultado) {
            echo json_encode([
               'resultado' => $resultado,
            ]);
         } else {
            echo json_encode(["resultado" => false]);
         }
      }
   }


   public static function mensaje(Router $router)
   {

      $router->render('admin/personal/mensaje', [
         'titulo' => 'Personal Actualizado correctamente'
      ]);
   }
}
