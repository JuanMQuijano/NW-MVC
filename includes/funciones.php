<?php
define('CARPETA_IMAGENES', __DIR__ . '/../public/imagenes/');

function debuguear($elemento)
{
    echo "<pre>";
    var_dump($elemento);
    echo "</pre>";
    exit;
}

//Escapa /Sanitiza el HTML
function s($html): string
{
    $s = strip_tags($html);
    return $s;
}

//Funcion que revisa que el usuario este autenticado
function isAuth(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

// function validarAdmin()
// {
//     session_start();

//     $auth = $_SESSION['login'] ?? null;

//     if ($_SESSION['tipo'] === 'usuario' || !$auth) {
//         header('Location: /');
//     }
// }

// function validarSesion()
// {
//     session_start();

//     $auth = $_SESSION['login'] ?? null;
//     $name = $_SESSION['name'] ?? null;


//     if (!$auth) {
//         header('Location: /');
//     }
// }
