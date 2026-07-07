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
         header('location: /admin/usuarios?page=1');
      }

      $usuarios = Usuario::paginar($registros_por_pagina, $paginacion->offset());

      $router->render('admin/usuarios/index', [
         'titulo' => 'Panel de Usuarios',
         'usuarios' => $usuarios,
         'paginacion' => $paginacion
      ]);
   }

   public static function crear(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $alertas = [];
      $usuario = new Usuario;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $usuario->sincronizar($_POST);

         $alertas = $usuario->validar_cuenta();

         if (empty($alertas)) {
            $existeUsuario = Usuario::where('email', $usuario->email);

            if ($existeUsuario) {
               echo json_encode(['resultado' => false, 'error' => 'El Usuario ya esta registrado']);
            } else {
               $usuario->hashPassword();
               unset($usuario->password2);
               $usuario->confirmado = 1;

               $resultado = $usuario->guardar();

               echo json_encode([
                  'resultado' => $resultado,
               ]);
            }
         } else {
            echo json_encode($alertas['error']);
         }

         return;
      }

      $router->render('admin/usuarios/crear', [
         'titulo' => 'Crear Usuario',
         'usuario' => $usuario,
         'alertas' => $alertas
      ]);
   }

   public static function editar(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id) {
         header('Location: /admin/usuarios');
      }

      $usuario = Usuario::find($id);

      if (!$usuario) {
         header('Location: /admin/usuarios');
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $usuario->sincronizar($_POST);

         $alertas = $usuario->validar_cuenta();

         if (empty($alertas)) {
            $usuario->hashPassword();
            unset($usuario->password2);

            $resultado = $usuario->guardar();

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

      $router->render('admin/usuarios/editar', [
         'titulo' => 'Editar Usuario',
         'usuario' => $usuario,
      ]);
   }

   public static function eliminar()
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = $_POST['id'];
         $usuario = Usuario::find($id);

         if (!isset($usuario)) {
            echo json_encode(["resultado" => false]);
            return;
         }

         $resultado = $usuario->eliminar();

         echo json_encode([
            'resultado' => $resultado,
         ]);
      }
   }
}
