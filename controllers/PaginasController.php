<?php

namespace Controllers;

use Model\Cargo;
use Model\Categoria;
use Model\Empresa;
use Model\Personal;
use Model\Proyecto;
use Model\ProyectoGaleria;
use Model\Servicio;
use MVC\Router;

class PaginasController
{
   public static function index(Router $router)
   {
      $empresa = Empresa::all();
      $servicios = Servicio::all();
      $proyectos = Proyecto::all();

      // debuguear($empresa);

      $router->render('paginas/index', [
         'titulo' => 'Start Tec Perú',
         'empresa' => $empresa[0],
         'servicios' => $servicios,
         'proyectos' => $proyectos,
      ]);
   }


   public static function nosotros(Router $router)
   {

      $servicios = Servicio::all();
      $empresa = Empresa::all();
      $personal = Personal::get(6);

      foreach ($personal as $persona) {
         $persona->categoria_id = Cargo::find($persona->cargo_id);
      }


      $router->render('paginas/nosotros', [
         'titulo' => 'Nosotros',
         'servicios' => $servicios,
         'empresa' => $empresa[0],
         'personal' => $personal,
      ]);
   }

   public static function servicios(Router $router)
   {
      // debuguear($name);
      $servicios = Servicio::all();
      $proyectos = Proyecto::all();
      $empresa = Empresa::all();

      $router->render('paginas/servicios', [
         'titulo' => 'Servicios',
         'servicios' => $servicios,
         'proyectos' => $proyectos,
         'empresa' => $empresa[0],
      ]);
   }

   public static function contacto(Router $router)
   {
      // debuguear($name);
      $empresa = Empresa::all();
      $servicios = Servicio::all();

      $router->render('paginas/contacto', [
         'titulo' => 'Contacto',
         'empresa' => $empresa[0],
         'servicios' => $servicios,
      ]);
   }

   public static function portafolio(Router $router)
   {
      // debuguear($name);
      $proyectos = Proyecto::all();
      $categorias = Categoria::all();
      $servicios = Servicio::all();

      $router->render('paginas/portafolio', [
         'titulo' => 'Portafolio',
         'proyectos' => $proyectos,
         'categorias' => $categorias,
         'servicios' => $servicios,
      ]);
   }

   public static function cotizacion(Router $router)
   {
      // debuguear($name);
      $servicios = Servicio::all();

      $router->render('paginas/cotizacion', [
         'titulo' => 'Cotizacion',
         'servicios' => $servicios,
      ]);
   }

   public static function proyecto(Router $router, $name)
   {
      $proyectos = Proyecto::all();
      $servicios = Servicio::all();
      $proyectoEncontrado = null;
      $galeriaImg = [];


      foreach ($proyectos as $proyecto) {
         if (getSlugify($proyecto->nombre) === $name) {
            $proyectoEncontrado = $proyecto;
            $galeriaImg = ProyectoGaleria::obtenerImagenesDeProyecto($proyectoEncontrado->id);
            break;
            // $proyecto->categoria_id = Cargo::find($proyecto->cargo_id);
         }
      }

      if ($proyectoEncontrado === null) {
         $router->render('paginas/error', [
            'titulo' => 'Producto no encontrado'
         ]);
         return;
      }

      // debuguear($galeriaImg);


      $router->render('paginas/proyecto', [
         'titulo' => $proyectoEncontrado->nombre,
         'proyecto' => $proyectoEncontrado,
         'servicios' => $servicios,
         'galeria' => $galeriaImg
      ]);
   }

   public static function paginasWeb(Router $router)
   {
      $servicios = Servicio::all();
      $empresa = Empresa::all();

      $router->render('paginas/paginas-web', [
         'servicios' => $servicios,
         'empresa' => $empresa[0],
      ]);
   }

   public static function webAdmin(Router $router)
   {
      $servicios = Servicio::all();
      $empresa = Empresa::all();

      $router->render('paginas/web-administrables', [
         'servicios' => $servicios,
         'empresa' => $empresa[0],
      ]);
   }

   public static function sistemasMulti(Router $router)
   {
      $servicios = Servicio::all();
      $empresa = Empresa::all();

      $router->render('paginas/sistemas-multi', [
         'servicios' => $servicios,
         'empresa' => $empresa[0],
      ]);
   }

   public static function servicio(Router $router, $name)
   {
      $servicios = Servicio::all();
      $empresa = Empresa::all();

      $servicioEncontrado = null;

      foreach ($servicios as $servicio) {
         if (getSlugify($servicio->titulo) === $name) {
            $servicioEncontrado = $servicio;
            break;
         }
      }

      if ($servicioEncontrado === null) {
         $router->render('paginas/error', [
            'titulo' => 'Servicio no encontrado'
         ]);
         return;
      }

      $router->render('paginas/servicio', [
         'titulo' => $servicio->titulo,
         'servicio' => $servicio,
         'servicios' => $servicios,
         'empresa' => $empresa[0],
      ]);
   }


   public static function error(Router $router)
   {

      $router->render('paginas/error', [
         'titulo' => 'Página no encontrada',
      ]);
   }
}
