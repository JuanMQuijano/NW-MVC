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

    public function validarRegistro()
    {
        if (!$this->Nombre) {
            self::$alertas["error"][] = "Debes Ingresar un Nombre";
        }
        if (!$this->Apellido) {
            self::$alertas["error"][] = "Debes Ingresar un Apellido";
        }
        if (!$this->Correo) {
            self::$alertas["error"][] = "Debes Ingresar un Correo";
        }
        if (!$this->Contraseña) {
            self::$alertas["error"][] = "Debes Ingresar una Contraseña";
        }
        if (strlen($this->Contraseña) < 6) {
            self::$alertas["error"][] = "La Contraseña debe tener 6 o más digitos";
        }
        if (!$this->Genero) {
            self::$alertas["error"][] = "Debes Seleccionar un Genero";
        }
        if (!$this->FechaN) {
            self::$alertas["error"][] = "Debes Ingresar una Fecha de Nacimiento";
        }
        if (!$this->Acuerdos) {
            self::$alertas["error"][] = "Por favor Acepta los Términos y Condiciones";
        }

        return self::$alertas;
    }

    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE CORREO = '" . $this->Correo . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = "El Usuario Ya Está Registrado";
        }

        return $resultado;
    }

    public function hashPassword()
    {
        $this->Contraseña = password_hash($this->Contraseña, PASSWORD_BCRYPT);
    }
}
