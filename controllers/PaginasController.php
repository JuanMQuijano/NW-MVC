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
        $router->render('paginas/index', 
        ['inicio' => true, 
        'valor' => 0, 
        'prendas' => $prendas]);
    }
}
