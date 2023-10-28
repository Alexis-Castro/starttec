<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Servicio;

class ServiciosController
{
   public static function index(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/servicios?page=1');
      }

      $registros_por_pagina = 5;
      $total = Servicio::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($total == 0) {
         // No hay registros en la base de datos, mostrar mensaje de error o redirigir a otra página
         header('Location: /admin/servicios/crear');
      } else if ($paginacion->total_paginas() < $pagina_actual) {
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/servicios?page=1');
      }

      $servicios = Servicio::paginar($registros_por_pagina, $paginacion->offset());

      // $empresa = Servicio::all();

      $router->render('admin/servicios/index', [
         'titulo' => 'Panel de Servicios',
         'servicios' => $servicios,
         'paginacion' => $paginacion

      ]);
   }

   public static function crear(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }
      $alertas = [];

      $servicios = new Servicio;
      // debuguear($servicios);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }
         // Leer imagen
         if (!empty($_FILES['imagen']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/servicios';

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->resize(100, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->resize(100, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_imagen;
         }

         $servicios->sincronizar($_POST);

         // debuguear($servicios);

         // Validar
         $alertas = $servicios->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar las imagenes
            $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
            $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

            // Guardar en la BD
            $resultado = $servicios->guardar();

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

      $router->render('admin/servicios/crear', [
         'titulo' => 'Registrar Servicios',
         'servicios' => $servicios,
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
         header('Location: /admin/servicios?page=1');
      }

      // Obtener ponente a Editar
      $servicios = Servicio::find($id);

      if (!$servicios) {
         header('Location: /admin/servicios?page=1');
      }
      // debuguear($servicios);

      $servicios->imagen_actual = $servicios->imagen;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }

         // Leer imagen
         if (!empty($_FILES['imagen']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/servicios';

            // Eliminar la imagen previa
            unlink($carpeta_imagenes . '/' . $servicios->imagen_actual . ".png");
            unlink($carpeta_imagenes . '/' . $servicios->imagen_actual . ".webp");

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->resize(100, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->resize(100, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_imagen;
         } else {
            $_POST['imagen'] = $servicios->imagen_actual;
         }

         $servicios->sincronizar($_POST);

         $alertas = $servicios->validar();

         if (empty($alertas)) {
            if (isset($nombre_imagen)) {
               $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
               $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
            }
            $resultado = $servicios->guardar();

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

      $router->render('admin/servicios/editar', [
         'titulo' => 'Actualizar Servicios',
         'servicios' => $servicios,
         'alertas' => $alertas,
      ]);
   }

   public static function eliminar()
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }

         $id = $_POST['id'];
         $servicios = Servicio::find($id);

         if (!isset($servicios)) {
            header('Location: /admin/servicios');
         }

         if ($servicios->imagen) {
            $carpeta_imagenes = '../public/img/servicios';
            unlink($carpeta_imagenes . '/' . $servicios->imagen . ".png");
            unlink($carpeta_imagenes . '/' . $servicios->imagen . ".webp");
         }

         $resultado = $servicios->eliminar();

         if ($resultado) {
            echo json_encode([
               'resultado' => $resultado,
            ]);
         } else {
            echo json_encode(["resultado" => false]);
         }
      }
   }
}
