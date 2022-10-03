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
}
