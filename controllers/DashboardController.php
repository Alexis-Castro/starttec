<?php

namespace Controllers;

use Model\Contacto;
use Model\Cotizacion;
use Model\Personal;
use Model\Proyecto;
use Model\Servicio;
use Model\Usuario;
use MVC\Router;

class DashboardController
{
   public static function index(Router $router)
   {
      if (!is_admin()) {
         header('Location: /auth/login');
      }

      $total_proyectos = Proyecto::totalRegistros();
      $total_servicios = Servicio::totalRegistros();
      $total_personal = Personal::totalRegistros();
      $total_contactos = Contacto::totalRegistros();
      $total_cotizaciones = Cotizacion::totalRegistros();
      $total_usuarios = Usuario::totalRegistros();

      $router->render('admin/dashboard/index', [
         'titulo' => 'Panel de Administración',
         'total_proyectos' => $total_proyectos,
         'total_servicios' => $total_servicios,
         'total_personal' => $total_personal,
         'total_contactos' => $total_contactos,
         'total_cotizaciones' => $total_cotizaciones,
         'total_usuarios' => $total_usuarios,
      ]);
   }
}
