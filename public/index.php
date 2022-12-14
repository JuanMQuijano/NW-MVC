<?php

require_once __DIR__ . '/../includes/app.php';

use Controller\LoginController;
use Controller\PaginasController;
use Controller\AdminController;
use MVC\Router;

$router = new Router();

//Index y páginas
$router->get('/', [PaginasController::class, 'index']);
$router->get('/carrito', [PaginasController::class, 'carrito']);
$router->post('/carrito', [PaginasController::class, 'carrito']);
$router->get('/producto', [PaginasController::class, 'producto']);
$router->post('/producto', [PaginasController::class, 'producto']);
$router->get('/eliminar', [PaginasController::class, 'eliminar']);


//Iniciar y Cerrar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/salir', [LoginController::class, 'salir']);

//Registrarse 
$router->get('/registrarse', [LoginController::class, 'registrarse']);
$router->post('/registrarse', [LoginController::class, 'registrarse']);

//Admin
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/crear', [AdminController::class, 'crearPublicacion']);
$router->post('/admin/crear', [AdminController::class, 'crearPublicacion']);
$router->get('/admin/actualizar', [AdminController::class, 'actualizarPublicacion']);
$router->post('/admin/actualizar', [AdminController::class, 'actualizarPublicacion']);

$router->get('/admin/eliminar', [AdminController::class, 'eliminarPublicacion']);

$router->comprobarRutas();
