<?php 

require_once __DIR__ . '/../includes/app.php';
//inclusion de controllers

use Controllers\AdminController;
use Controllers\ApiController;
use Controllers\CitasController;
use Controllers\LoginController;
use Controllers\ServicioController;
use MVC\Router;

$router = new Router();


//Iniciar session

$router->get('/',[LoginController::class, 'login']);
$router->post('/',[LoginController::class, 'login']);
$router->get('/logout',[LoginController::class, 'logout']);

//Recuperar password

$router->get('/olvide',[LoginController::class,'olvide']);
$router->post('/olvide',[LoginController::class,'olvide']);
$router->get('/restablecer',[LoginController::class,'restablecer']);
$router->post('/restablecer',[LoginController::class,'restablecer']);

//Crear cuentas

$router->get('/crear',[LoginController::class,'crear']);
$router->post('/crear',[LoginController::class,'crear']);

//Confirmacion
$router->get('/confirmar',[LoginController::class,'confirmar']);
$router->post('/confirmar',[LoginController::class,'confirmar']);
$router->get('/mensaje',[LoginController::class,'mensaje']);

//Administracion Privada
$router->get('/cita',[CitasController::class,'index']);
$router->get('/panel',[CitasController::class,'panel']);
$router->get('/nosotros',[CitasController::class,'nosotros']);
$router->get('/admin',[AdminController::class,'index']);


//API  de  citas

$router->get('/api/servicios',[ApiController::class,'index']);
$router->post('/api/citas',[ApiController::class,'guardar']);
$router->post('/api/eliminar',[ApiController::class,'eliminar']);

//CRUD de Servicios

$router->get('/servicios',[ServicioController::class,'index']);
$router->get('/admin/crear',[ServicioController::class,'crear']);
$router->post('/admin/crear',[ServicioController::class,'crear']);
$router->get('/admin/actualizar',[ServicioController::class,'actualizar']);
$router->post('/admin/actualizar',[ServicioController::class,'actualizar']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();