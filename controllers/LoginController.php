<?php

namespace Controller;

use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        isAuth();

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
                            debuguear("1");
                            //header('Location: /admin');
                        } else {
                            header('Location: /');
                        }
                    } else {
                        Usuario::setAlerta('Error', 'Contraseña Incorrecta');
                    }
                } else {
                    Usuario::setAlerta('Error', 'Usuario No Encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('/auth/login', [
            'alertas' => $alertas,
            'auth' => $auth,
            'valor' => 2,
            'inicio' => null
        ]);
    }

    public static function registrarse(Router $router)
    {
        isAuth();

        $alertas = [];
        $usuario = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarRegistro();

            if (empty($alertas)) {
                $resultado = $usuario->existeUsuario();

                //Está registrado
                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else { //No esta registrado                                       

                    //HashPassword
                    $usuario->hashPassword();
                    $usuario->Tipo = "Usuario";

                    //Crear el usuario
                    $resultado = $usuario->guardar();

                    $usuario = $usuario->where('Correo', $usuario->Correo);
                    $_SESSION['id'] = $usuario->ID;
                    $_SESSION['nombre'] = $usuario->Nombre;
                    $_SESSION['login'] = true;

                    if ($resultado) {
                        header('Location: /');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/registro', [
            'valor' => 1,
            'usuario' => $usuario,
            'alertas' => $alertas

        ]);
    }

    public static function salir()
    {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}
