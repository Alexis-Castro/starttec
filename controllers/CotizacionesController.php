<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Cotizacion;
use MVC\Router;

class CotizacionesController
{
   public static function index(Router $router)
   {

      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/cotizaciones?page=1');
      }

      $registros_por_pagina = 5;
      $total = Cotizacion::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($paginacion->total_paginas() < $pagina_actual) {
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/cotizaciones?page=1');
      }

      $cotizaciones = Cotizacion::paginar($registros_por_pagina, $paginacion->offset());

      $router->render('admin/cotizaciones/index', [
         'titulo' => 'Panel de Cotizaciones',
         'cotizaciones' => $cotizaciones,
         'paginacion' => $paginacion
      ]);
   }

   public static function crear()
   {

      $alertas = [];
      $cotizacion = new Cotizacion;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $cotizacion->sincronizar($_POST);

         // Validar
         $alertas = $cotizacion->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar en la BD
            $resultado = $cotizacion->guardar();

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
