<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Empresa;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class EmpresaController
{
   public static function index(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/empresa?page=1');
      }

      $registros_por_pagina = 5;
      $total = Empresa::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($total == 0) {
         // No hay registros en la base de datos, mostrar mensaje de error o redirigir a otra página
         header('Location: /admin/empresa/crear');
      } else if ($paginacion->total_paginas() < $pagina_actual) {
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/empresa?page=1');
      }

      $empresa = Empresa::paginar($registros_por_pagina, $paginacion->offset());


      // $empresa = Empresa::all();

      $router->render('admin/empresa/index', [
         'titulo' => 'Panel de Informacion de la Empresa',
         'empresa' => $empresa,
         'paginacion' => $paginacion
      ]);
   }

   public static function crear(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $alertas = [];
      $empresa = new Empresa;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // Leer imagen
         if (!empty($_FILES['imagen_inicio']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/empresa';

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen_inicio']['tmp_name'])->resize(1920, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen_inicio']['tmp_name'])->resize(1920, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen_inicio'] = $nombre_imagen;
         }

         if (!empty($_FILES['video_inicio']['tmp_name'])) {
            $carpeta_videos = '../public/video/empresa'; // Directorio donde se guardarán los videos
            $file_extension = pathinfo($_FILES['video_inicio']['name'], PATHINFO_EXTENSION);

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_videos)) {
               mkdir($carpeta_videos, 0755, true);
            }

            // Verificar que el archivo es un video
            $videoType = pathinfo($carpeta_videos . $_FILES['video_inicio']['name'], PATHINFO_EXTENSION);

            if ($videoType != "mp4" && $videoType != "avi" && $videoType != "mov" && $videoType != "mpeg") {
               echo "Solo se permiten archivos de video mp4, avi o mov.";
            } else {
               $nombre_video = md5(uniqid(rand(), true));

               $_POST['video_inicio'] = $nombre_video;
            }
         }

         $empresa->sincronizar($_POST);

         // Validar
         $alertas = $empresa->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar las imagenes
            $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
            $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

            // Mover el archivo al directorio de destino
            move_uploaded_file($_FILES['video_inicio']['tmp_name'], $carpeta_videos . '/' . $nombre_video . '.' . $file_extension);

            // Guardar en la BD
            $resultado = $empresa->guardar();

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

      // Render a la vista
      $router->render('admin/empresa/crear', [
         'titulo' => 'Registrar Info de Empresa',
         'empresa' => $empresa,
         'alertas' => $alertas
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
         header('Location: /admin/empresa');
      }

      // Obtener empresa a Editar
      $empresa = Empresa::find($id);
      if (!$empresa) {
         header('Location: /admin/empresa');
      }

      $empresa->imagen_inicio_actual = $empresa->imagen_inicio;
      $empresa->video_inicio_actual = $empresa->video_inicio;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!is_admin()) {
            header('Location: /auth/login');
         }

         // Leer imagen
         if (!empty($_FILES['imagen_inicio']['tmp_name'])) {

            $carpeta_imagenes = '../public/img/empresa';

            // Eliminar la imagen previa
            unlink($carpeta_imagenes . '/' . $empresa->imagen_inicio_actual . ".png");
            unlink($carpeta_imagenes . '/' . $empresa->imagen_inicio_actual . ".webp");

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_imagenes)) {
               mkdir($carpeta_imagenes, 0755, true);
            }

            $imagen_png = Image::make($_FILES['imagen_inicio']['tmp_name'])->resize(1920, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('png', 80);

            $imagen_webp = Image::make($_FILES['imagen_inicio']['tmp_name'])->resize(1920, null, function ($constraint) {
               $constraint->aspectRatio();
            })->encode('webp', 80);

            $nombre_imagen = md5(uniqid(rand(), true));

            $_POST['imagen_inicio'] = $nombre_imagen;
         } else {
            $_POST['imagen_inicio'] = $empresa->imagen_inicio_actual;
         }

         if (!empty($_FILES['video_inicio']['tmp_name'])) {
            $carpeta_videos = '../public/video/empresa'; // Directorio donde se guardarán los videos
            $file_extension = pathinfo($_FILES['video_inicio']['name'], PATHINFO_EXTENSION);

            // Crear la carpeta si no existe
            if (!is_dir($carpeta_videos)) {
               mkdir($carpeta_videos, 0755, true);
            }

            // Verificar que el archivo es un video
            $videoType = pathinfo($carpeta_videos . $_FILES['video_inicio']['name'], PATHINFO_EXTENSION);


            if ($videoType != "mp4" && $videoType != "avi" && $videoType != "mov" && $videoType != "mpeg") {
               echo "Solo se permiten archivos de video mp4, avi o mov.";
            } else {
               $nombre_video = md5(uniqid(rand(), true));

               $_POST['video_inicio'] = $nombre_video;
            }
         } else {
            $_POST['video_inicio'] = $empresa->video_inicio_actual;
         }

         $empresa->sincronizar($_POST);

         $alertas = $empresa->validar();

         if (empty($alertas)) {
            if (isset($nombre_imagen)) {
               $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
               $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
            }
            if (isset($nombre_video)) {
               // Mover el archivo al directorio de destino
               move_uploaded_file($_FILES['video_inicio']['tmp_name'], $carpeta_videos . '/' . $nombre_video . '.' . $file_extension);
            }
            $resultado = $empresa->guardar();

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

      // Render a la vista
      $router->render('admin/empresa/editar', [
         'titulo' => 'Editar Info de Empresa',
         'empresa' => $empresa,
         'alertas' => $alertas
      ]);
      // debuguear($empresa);
   }
}
