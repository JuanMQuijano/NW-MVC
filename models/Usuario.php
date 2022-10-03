<?php

namespace Model;

class Usuario extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['ID', 'Nombre', 'Apellido', 'Correo', 'Contraseña', 'Genero', 'FechaN', 'Acuerdos', 'Tipo'];

    //Atributos
    public $ID;
    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Contraseña;
    public $Genero;
    public $FechaN;
    public $Acuerdos;
    public $Tipo;

    //Constructor
    public function __construct($args = [])
    {
        $this->ID = $args['ID'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Apellido = $args['Apellido'] ?? '';
        $this->Correo = $args['Correo'] ?? '';
        $this->Contraseña = $args['Contraseña'] ?? '';
        $this->Genero = $args['Genero'] ?? '';
        $this->FechaN = $args['FechaN'] ?? '';
        $this->Acuerdos = $args['Acuerdos'] ?? '';
        $this->Tipo = $args['Tipo'] ?? '';
    }

    public function validarLogin()
    {
        if (!$this->Correo) {
            self::$alertas["error"][] = "Debes Ingresar un Correo";
        }
        if (!$this->Contraseña) {
            self::$alertas["error"][] = "Debes Ingresar una Contraseña";
        }

        return self::$alertas;
    }

    public function verificarPassword($Contraseña)
    {
        return password_verify($Contraseña, $this->Contraseña);
    }
}
