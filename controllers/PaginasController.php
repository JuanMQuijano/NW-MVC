<?php

namespace Controller;

use Model\Compra;
use Model\Carrito;
use Model\Codigo;
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

    public static function producto(Router $router)
    {
        $id = $_GET['ID'] ?? null;
        $carrito = new Carrito();
        $prenda = Prenda::find($id);
        $alerta = 0;

        if (!$id) {
            header('Location: /');
        }

        if (!$prenda) {
            header('Location: /');
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $carrito = new Carrito($_POST);
            $resultado = $carrito->addCar();

            if ($resultado) {
                $alerta = 1;
            }
        }

        $nombre = $_SESSION['nombre'] ?? '';
        $router->render('paginas/producto', [
            'nombre' => $nombre,
            'valor' => $nombre ? 3 : 0,
            'alerta' => $alerta,
            'prenda' => $prenda
        ]);
    }

    public static function carrito(Router $router)
    {
        $valido = true;
        $logged = true;
        $aplicado = false;

        $carrito = new Carrito();
        $codigo = new Codigo();
        $compra = new Compra();

        $carrito->IDSESSION = session_id();
        $prendas = $carrito->sqlCar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $codigo = new Codigo($_POST);
            $compra = new Compra($_POST);
            $codigo = $codigo::where('Codigo', $codigo->Codigo);
            is_null($codigo) ? $valido = false : [$valido = true, $aplicado = true];

            if (!empty($compra->ValorFinal)) {
                $auth = $_SESSION['login'] ?? null;
                if (!$auth) {
                    $logged = false;
                } else {
                    foreach ($prendas as $prenda) {
                        $compra->insert($prenda);
                    }
                }
            }
        }

        $nombre = $_SESSION['nombre'] ?? '';
        $router->render(
            'paginas/carrito',
            [
                'nombre' => $nombre,
                'valor' => $nombre ? 3 : 0,
                'prendas' => $prendas,
                'codigo' => $codigo,
                'compra' => $compra,
                'valido' => $valido,
                'logged' => $logged,
                'aplicado' => $aplicado
            ]
        );
    }

    public static function eliminar()
    {
        $ID = $_GET['ID'];
        $carrito = new Carrito();
        $carrito->IDSESSION = session_id();
        $carrito->IDPRENDA = $ID;

        if ($carrito->eliminar()) {
            header('Location: /carrito');
        }
    }
}
