<?php

namespace Model;

use Model\ActiveRecord;

class Codigo extends ActiveRecord
{
    protected static $tabla = 'codigos';
    protected static $columnasDB = ['ID', 'Codigo', 'Porcentaje', 'NombreEncargado'];

    public $ID;
    public $Codigo;
    public $Porcentaje;
    public $NombreEncargado;

    public function __construct($args = [])
    {
        $this->ID = $args['ID'] ?? null;
        $this->Codigo = $args['Codigo'] ?? '';
        $this->Porcentaje = $args['Porcentaje'] ?? '';
        $this->NombreEncargado = $args['NombreEncargado'] ?? '';
    }
}
