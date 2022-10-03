<?php

require_once __DIR__ . '/../includes/app.php';

use Controller\LoginController;
use Controller\PaginasController;
use MVC\Router;

$router = new Router();

//Index y páginas
$router->get('/', [PaginasController::class, 'index']);

//Iniciar y Cerrar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

//Registrarse 
$router->get('/registrarse', [LoginController::class, 'registrarse']);
$router->post('/registrarse', [LoginController::class, 'registrarse']);


$router->comprobarRutas();
