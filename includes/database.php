<?php

$db = mysqli_connect("localhost", "root", "Juanma20Quijano2", "NW");

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
