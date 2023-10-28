<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APICargos;
use Controllers\APICategorias;
use Controllers\APIGaleria;
use Controllers\APIProyectos;
use Controllers\AuthController;
use Controllers\CargosController;
use Controllers\CategoriasController;
use Controllers\ContactosController;
use Controllers\CotizacionesController;
use Controllers\DashboardController;
use Controllers\EmpresaController;
use Controllers\PaginasController;
use Controllers\PersonalController;
use Controllers\ProyectosController;
use Controllers\ServiciosController;
use Controllers\UsuariosController;
use MVC\Router;

$router = new Router();


// Login
$router->get('/auth/login', [AuthController::class, 'login']);
$router->post('/auth/login', [AuthController::class, 'login']);
$router->post('/auth/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/auth/registro', [AuthController::class, 'registro']);
$router->post('/auth/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/auth/olvide', [AuthController::class, 'olvide']);
$router->post('/auth/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/auth/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/auth/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/auth/mensaje', [AuthController::class, 'mensaje']);
$router->get('/auth/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Área admin
$router->get('/admin/dashboard', [DashboardController::class, 'index']);
$router->get('/admin/contactos', [ContactosController::class, 'index']);
$router->get('/admin/cotizaciones', [CotizacionesController::class, 'index']);
$router->get('/admin/usuarios', [UsuariosController::class, 'index']);

// EMPRESA
$router->get('/admin/empresa', [EmpresaController::class, 'index']);
$router->post('/admin/empresa/crear', [EmpresaController::class, 'crear']);
$router->get('/admin/empresa/editar', [EmpresaController::class, 'editar']);
$router->post('/admin/empresa/editar', [EmpresaController::class, 'editar']);

// SERVICIOS
$router->get('/admin/servicios', [ServiciosController::class, 'index']);
$router->get('/admin/servicios/crear', [ServiciosController::class, 'crear']);
$router->post('/admin/servicios/crear', [ServiciosController::class, 'crear']);
$router->get('/admin/servicios/editar', [ServiciosController::class, 'editar']);
$router->post('/admin/servicios/editar', [ServiciosController::class, 'editar']);
$router->post('/admin/servicios/eliminar', [ServiciosController::class, 'eliminar']);

// PERSONAL
$router->get('/admin/personal', [PersonalController::class, 'index']);
$router->get('/admin/personal/crear', [PersonalController::class, 'crear']);
$router->post('/admin/personal/crear', [PersonalController::class, 'crear']);
$router->get('/admin/personal/editar', [PersonalController::class, 'editar']);
$router->post('/admin/personal/editar', [PersonalController::class, 'editar']);
$router->post('/admin/personal/eliminar', [PersonalController::class, 'eliminar']);

// CARGOS
$router->get('/admin/cargos', [CargosController::class, 'index']);
$router->post('/admin/cargos/crear', [CargosController::class, 'crear']);
$router->post('/admin/cargos/editar', [CargosController::class, 'editar']);
$router->get('/api/cargo', [APICargos::class, 'cargo']);

// PROYECTOS
$router->get('/admin/proyectos/listado', [ProyectosController::class, 'index']);
$router->get('/admin/proyectos/crear', [ProyectosController::class, 'crear']);
$router->post('/admin/proyectos/crear', [ProyectosController::class, 'crear']);
$router->get('/admin/proyectos/editar', [ProyectosController::class, 'editar']);
$router->post('/admin/proyectos/editar', [ProyectosController::class, 'editar']);
$router->post('/admin/proyecto/image/eliminar', [ProyectosController::class, 'eliminarImg']);
$router->get('/api/proyectos', [APIProyectos::class, 'index']);
$router->get('/api/proyectos/categoria', [APIProyectos::class, 'categoria']);
$router->get('/api/proyecto', [APIProyectos::class, 'proyecto']);
$router->get('/api/galeria/proyecto', [APIGaleria::class, 'galeria']);

$router->get('/admin/proyectos/categorias', [CategoriasController::class, 'index']);
$router->post('/admin/categorias/crear', [CategoriasController::class, 'crear']);
$router->post('/admin/categorias/editar', [CategoriasController::class, 'editar']);
// $router->post('/admin/categorias/eliminar', [CategoriasController::class, 'eliminar']);
$router->get('/api/categoria', [APICategorias::class, 'categoria']);



// $router->get('/admin/cargos', [PersonalController::class, 'cargos']);
// $router->get('/admin/cargos', [PersonalController::class, 'cargos']);


// Área Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/servicios', [PaginasController::class, 'servicios']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/admin/contactos/crear', [ContactosController::class, 'crear']);
$router->post('/admin/contactos/news', [ContactosController::class, 'news']);

$router->get('/portafolio', [PaginasController::class, 'portafolio']);

$router->get('/cotizacion', [PaginasController::class, 'cotizacion']);
$router->post('/admin/cotizaciones/crear', [CotizacionesController::class, 'crear']);

// $router->get('/servicio/{name}', [PaginasController::class, 'servicio']);
$router->get('/servicio/desarrollo-de-paginas-web', [PaginasController::class, 'paginasWeb']);
$router->get('/servicio/sitios-web-administrables', [PaginasController::class, 'webAdmin']);
$router->get('/servicio/sistemas-multiplataforma', [PaginasController::class, 'sistemasMulti']);
$router->get('/proyecto/{name}', [PaginasController::class, 'proyecto']);


// Error
$router->get('/404', [PaginasController::class, 'error']);


$router->comprobarRutas();
