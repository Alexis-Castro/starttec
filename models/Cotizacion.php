<?php

namespace Model;

class Cotizacion extends ActiveRecord
{
   protected static $tabla = 'cotizaciones';
   protected static $columnasDB = ['id', 'nombres', 'email', 'telefono', 'servicio', 'descripcion'];

   public $id;
   public $nombres;
   public $email;
   public $telefono;
   public $servicio;
   public $descripcion;
   public $created_at;



   public function validar()
   {
      if (!$this->nombres) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }
      if (!$this->email) {
         self::$alertas['error'][] = 'El email es obligatorio';
      }
      if (!$this->telefono) {
         self::$alertas['error'][] = 'El telefono es obligatorio';
      }
      if (!$this->servicio) {
         self::$alertas['error'][] = 'El servicio es obligatorio';
      }
      if (!$this->descripcion) {
         self::$alertas['error'][] = 'El descripcion es obligatorio';
      }

      return self::$alertas;
   }
}
