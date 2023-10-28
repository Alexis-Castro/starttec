<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Usuario;
use MVC\Router;

class UsuariosController
{
   public static function index(Router $router)
   {

      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if (!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/usuarios?page=1');
      }

      $registros_por_pagina = 5;
      $total = Usuario::totalRegistros();
      $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

      if ($paginacion->total_paginas() < $pagina_actual) {
         // La página actual es mayor que el número total de páginas, redireccionar a la página 1
         header('location: /admin/usuarios?page=1');
      }

      $usuarios = Usuario::paginar($registros_por_pagina, $paginacion->offset());

      $router->render('admin/usuarios/index', [
         'titulo' => 'Panel de Usuarios',
         'usuarios' => $usuarios,
         'paginacion' => $paginacion
      ]);
   }
}
