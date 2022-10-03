<?php

namespace Controller;

use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];
        $auth = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('Correo', $auth->Correo);

                if ($usuario) {

                    if ($usuario->verificarPassword($auth->Contraseña)) {
                        //Autenticar al usuario
                        if (!isset($_SESSION)) {
                            session_start();
                        }

                        $_SESSION['id'] = $usuario->ID;
                        $_SESSION['nombre'] = $usuario->Nombre;
                        $_SESSION['login'] = true;

                        //Redireccionamiento
                        if ($usuario->Tipo === "Administrador") {
                            $_SESSION['admin'] = $usuario->Tipo ?? null;

                            //header('Location: /admin');
                        } else {
                            //header('Location: /cita');
                        }
                    } else {
                        Usuario::setAlerta('Error', 'Contraseña Incorrecta');
                    }
                } else {
                    Usuario::setAlerta('Error', 'Usuario No Encontrado');
                }
            }
        }

        $alertas = Usuario::getErrores();
        $router->render('/auth/login', [
            'alertas' => $alertas,
            'auth' => $auth,
            'valor' => 2,
            'inicio' => null
        ]);
    }

    public static function registrarse(Router $router)
    {
        $alertas = [];
        $usuario = new Usuario();
        $router->render('auth/registro', [
            'valor' => 1,            
            'usuario' => $usuario,
            'alertas' => $alertas

        ]);
    }
}
