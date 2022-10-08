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
        $nombre = $_SESSION['nombre'] ?? '';
        $router->render(
            'paginas/index',
            [
                'inicio' => true,
                'nombre' => $nombre,
                'valor' => $nombre ? 3 : 0,
                'prendas' => $prendas
            ]
        );
    }

    public static function carrito(Router $router)
    {
        // $router->render();
    }
}
