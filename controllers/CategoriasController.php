<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use MVC\Router;

class CategoriasController
{
   public static function index(Router $router)
   {

      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/proyectos/categorias?page=1');
      }

      $registros_por_pagina = 5;
      $total = Categoria::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($paginacion->total_paginas() < $pagina_actual) {
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/proyectos/categorias?page=1');
      }

      $categorias = Categoria::paginar($registros_por_pagina, $paginacion->offset());


      // $categorias = Categoria::all();

      $router->render('admin/proyectos/categorias', [
         'titulo' => 'Panel de Categorias',
         'categorias' => $categorias,
         'paginacion' => $paginacion
      ]);
   }


   public static function crear()
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $alertas = [];
      $cargo = new Categoria;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $cargo->sincronizar($_POST);

         // Validar
         $alertas = $cargo->validar();

         // Guardar el registro
         if (empty($alertas)) {

            // Guardar en la BD
            $resultado = $cargo->guardar();

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

      // // Render a la vista
      // $router->render('admin/cargo/crear', [
      //    'titulo' => 'Registrar Info de Empresa',
      //    'empresa' => $empresa,
      //    'alertas' => $alertas
      // ]);
   }

   public static function editar()
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }
      $alertas = [];

      // // Validar el ID
      // $id = $_GET['id'];
      // $id = filter_var($id, FILTER_VALIDATE_INT);

      // if (!$id) {
      //    header('Location: /admin/cargo');
      // }


      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         // Obtener cargo a Editar
         $id = $_POST['id'];
         $cargo = Categoria::find($id);

         if (!$cargo) {
            header('Location: /admin/cargo');
         }

         $cargo->sincronizar($_POST);

         $alertas = $cargo->validar();

         if (empty($alertas)) {

            $resultado = $cargo->guardar();

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
