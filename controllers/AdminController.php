<?php

namespace Controller;

use Model\ActiveRecord;
use Model\Prenda;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


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

    public static function crearPublicacion(Router $router)
    {
        $alertas = [];
        $prenda = new Prenda();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenda = new Prenda($_POST);

            //Generamos un nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".webp";

            //Setear la imagen
            if ($_FILES['Imagen']['tmp_name']) {
                //Realiza un resize a la imagen con intervention
                $imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $prenda->setImagen($nombreImagen);
            }

            $alertas = $prenda->validar();

            if (empty($alertas)) {
                /*** SUBIDA DE ARCHIVOS ***/

                //Si una carpeta existe o no
                if (!is_dir(CARPETA_IMAGENES)) {
                    //Si no existe, crearla
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);

                //Guarda en la bd
                if ($prenda->guardar()) {
                    header('Location: /admin');
                } else {
                    $alertas = $prenda::setAlerta('error', 'Vuelve a intentar');
                }
            }
        }

        $alertas = $prenda::getAlertas();
        $router->render(
            'admin/crear',
            [
                'alertas' => $alertas,
                'prenda' => $prenda
            ]
        );
    }

    public static function actualizarPublicacion(Router $router)
    {
        $ID = $_GET['ID'];
        $prenda = new Prenda();
        $prenda = $prenda->find($ID);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Generamos un nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".webp";

            //Setear la imagen
            if ($_FILES['Imagen']['tmp_name']) {
                //Realiza un resize a la imagen con intervention
                $imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $prenda->setImagen($nombreImagen);
            }

            /*** SUBIDA DE ARCHIVOS ***/

            //Si una carpeta existe o no
            if (!is_dir(CARPETA_IMAGENES)) {
                //Si no existe, crearla
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la imagen en el servidor
            $imagen->save(CARPETA_IMAGENES . $nombreImagen);

            //Guarda en la bd
            if ($prenda->guardar()) {
                header('Location: /admin');
            }
        }


        $router->render('admin/actualizar', ['prenda' => $prenda]);
    }

    public static function eliminarPublicacion()
    {
        $ID = $_GET['ID'];
        $prenda = new Prenda();
        $prenda = $prenda->find($ID);

        if ($prenda->eliminar()) {
            header('Location: /admin');
        }
    }
}
