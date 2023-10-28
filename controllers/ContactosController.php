<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Contacto;
use Model\Newsletter;
use MVC\Router;

class ContactosController
{
   public static function index(Router $router)
   {

      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/contactos?page=1');
      }

      $registros_por_pagina = 5;
      $total = Contacto::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($paginacion->total_paginas() < $pagina_actual) {
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/contactos?page=1');
      }

      $contactos = Contacto::paginar($registros_por_pagina, $paginacion->offset());

      $router->render('admin/contactos/index', [
         'titulo' => 'Panel de Contactos',
         'contactos' => $contactos,
         'paginacion' => $paginacion
      ]);
   }

   public static function crear()
   {

      $alertas = [];
      $contacto = new Contacto;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $contacto->sincronizar($_POST);

         // Validar
         $alertas = $contacto->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar en la BD
            $resultado = $contacto->guardar();

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
   }

   public static function news()
   {
      $alertas = [];
      $news = new Newsletter;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $news->sincronizar($_POST);

         // Validar
         $alertas = $news->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar en la BD
            $resultado = $news->guardar();

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
   }
}
