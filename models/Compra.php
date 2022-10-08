<?php

namespace Model;

use Model\ActiveRecord;

class Compra extends ActiveRecord
{
    protected static $tabla = 'compras';
    protected static $columnasDB = ['ID', 'IDUSUARIO', 'IDPRENDA', 'Talla', 'Cantidad', 'Codigo', 'ValorUnitario', 'ValorFinal', 'Direccion', 'Telefono', 'FechaCompra', 'Entregado'];

    public $ID;
    public $IDUSUARIO;
    public $IDPRENDAD;
    public $Talla;
    public $Cantidad;
    public $Codigo;
    public $ValorUnitario;
    public $ValorFinal;
    public $Direccion;
    public $Telefono;
    public $FechaCompra;
    public $Entregado;

    public function __construct($args = [])
    {
        $this->ID = $args['ID'] ?? null;
        $this->IDUSUARIO = $args['IDUSUARIO'] ?? '';
        $this->IDPRENDAD = $args['IDPRENDAD'] ?? '';
        $this->Talla = $args['Talla'] ?? '';
        $this->Cantidad = $args['Cantidad'] ?? '';
        $this->Codigo = $args['Codigo'] ?? '';
        $this->ValorUnitario = $args['ValorUnitario'] ?? '';
        $this->ValorFinal = $args['ValorFinal'] ?? '';
        $this->Direccion = $args['Direccion'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
        $this->FechaCompra = $args['FechaCompra'] ?? '';
        $this->Entregado = $args['Entregado'] ?? '';
    }

    public function insert($prenda)
    {
        $fecha = date('y/m/d');
        $query = "INSERT INTO compras(IDUSUARIO, IDPRENDA, Talla, Cantidad, Codigo, ValorUnitario, ValorFinal, Direccion, Telefono, FechaCompra, Entregado) 
                        VALUES ('$_SESSION[id]','$prenda->IDPRENDA','$prenda->Talla','$prenda->Cantidad','$this->Codigo','$prenda->Precio','$this->ValorFinal','$this->Direccion', '$this->Telefono','$fecha','NO')";

        return self::$db->query($query);
    }
}
