<?php

namespace Model;

class ProyectoGaleria extends ActiveRecord
{
    protected static $tabla = 'imagenes_proyecto';
    protected static $columnasDB = ['id', 'imagen', 'proyecto_id'];

    public $id;
    public $imagen;
    public $proyecto_id;
    // public $imagen_actual;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->proyecto_id = $args['proyecto_id'] ?? '';
    }
}
