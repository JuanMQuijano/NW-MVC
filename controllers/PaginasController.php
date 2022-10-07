<?php

namespace Controller;

use Model\Prenda;
use MVC\Router;

class PaginasController
{
    public static function index(Router $router)
    {
        $prendas = new Prenda();
        $prendas = $prendas->all();
        $router->render(
            'paginas/index',
            [
                'inicio' => true,
                'nombre' => $_SESSION['nombre'] ?? '',
                'valor' => $_SESSION['nombre'] ? 3 : 0,
                'prendas' => $prendas
            ]
        );
    }
}
