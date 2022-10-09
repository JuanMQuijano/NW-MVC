<?php

namespace Controller;

use Model\ActiveRecord;
use Model\Prenda;
use MVC\Router;


class AdminController extends ActiveRecord
{
    public static function index(Router $router)
    {
        $prendas = new Prenda();
        $prendas = $prendas::all();
        $nombre = $_SESSION['nombre'] ?? '';

        $router->render('admin/index', [
            'prendas' => $prendas,
            'nombre' => $nombre,
            'valor' => $nombre ? 3 : 0,
        ]);
    }
}
