<?php

namespace Model;

use Model\ActiveRecord;

class Carrito extends ActiveRecord
{
    protected static $tabla = "carrito";
    protected static $columnasDB = ['IDSESSION', 'IDPRENDA', 'Talla', 'Cantidad', 'Nombre', 'Imagen', 'Precio'];

    public $IDSESSION;
    public $IDPRENDA;
    public $Talla;
    public $Cantidad;

    public function __construct($args = [])
    {
        $this->IDSESSION = $args['IDSESSION'] ?? '';
        $this->IDPRENDA = $args['IDPRENDA'] ?? '';
        $this->Talla = $args['Talla'] ?? '';
        $this->Cantidad = $args['Cantidad'] ?? '';
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Imagen = $args['Imagen'] ?? '';
        $this->Precio = $args['Precio'] ?? '';
    }

    public function addCar(): bool
    {
        $query = "INSERT INTO CARRITO (IDSESSION, IDPRENDA, Talla, Cantidad) VALUES ('{$this->IDSESSION}', '{$this->IDPRENDA}', '{$this->Talla}', '{$this->Cantidad}')";

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function sqlCar()
    {
        $query = "SELECT * FROM CARRITO AS C LEFT OUTER JOIN PRENDAS AS P ON C.IDPRENDA = P.ID WHERE C.IDSESSION = '{$this->IDSESSION}'";
        return self::consultarSQL($query);
    }

    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE IDSESSION = '{$this->IDSESSION}' AND IDPRENDA = '{$this->IDPRENDA}' LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}
