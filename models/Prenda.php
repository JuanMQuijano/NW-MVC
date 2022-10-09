<?php

namespace Model;

class Prenda extends ActiveRecord
{
    protected static $tabla = 'prendas';
    protected static $columnasDB = ['ID', 'Nombre', 'Descripcion', 'Tipo', 'Imagen', 'Precio', 'S', 'M', 'L', 'XL'];

    public $ID;
    public $Nombre;
    public $Descripcion;
    public $Tipo;
    public $Imagen;
    public $Precio;
    public $S;
    public $M;
    public $L;
    public $XL;

    public function __construct($args = [])
    {
        $this->ID = $args['ID'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Descripcion = $args['Descripcion'] ?? '';
        $this->Tipo = $args['Tipo'] ?? '';
        $this->Imagen = $args['Imagen'] ?? '';
        $this->Precio = $args['Precio'] ?? '';
        $this->S = $args['S'] ?? '';
        $this->M = $args['M'] ?? '';
        $this->L = $args['L'] ?? '';
        $this->XL = $args['XL'] ?? '';
    }

    public function validar()
    {
        if (!$this->Nombre) {
            self::$alertas["error"][] = "Debes Ingresar un Nombre";
        }
        if (!$this->Descripcion) {
            self::$alertas["error"][] = "Debes Ingresar una Descripcion";
        }
        if (!$this->Tipo) {
            self::$alertas["error"][] = "Debes Seleccionar un Tipo de Prenda";
        }
        if (!$this->Imagen) {
            self::$alertas["error"][] = "Debes Seleccionar una Imagen";
        }
        if (!$this->Precio) {
            self::$alertas["error"][] = "Debes Ingresar un Precio";
        }
        if (!$this->S) {
            self::$alertas["error"][] = "Talla S?";
        }
        if (!$this->M) {
            self::$alertas["error"][] = "Talla M?";
        }
        if (!$this->L) {
            self::$alertas["error"][] = "Talla L?";
        }
        if (!$this->XL) {
            self::$alertas["error"][] = "Talla XL?";
        }


        return self::$alertas;
    }
}
