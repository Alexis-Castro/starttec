<?php

namespace Model;

class Contacto extends ActiveRecord
{
   protected static $tabla = 'contactos';
   protected static $columnasDB = ['id', 'nombres', 'asunto', 'email', 'telefono', 'mensaje'];

   public $id;
   public $nombres;
   public $asunto;
   public $email;
   public $telefono;
   public $mensaje;
   public $created_at;


   public function validar()
   {
      if (!$this->nombres) {
         self::$alertas['error'][] = 'El nombres es obligatorio';
      }

      if (!$this->email) {
         self::$alertas['error'][] = 'El email es obligatorio';
      }
      if (!$this->telefono) {
         self::$alertas['error'][] = 'El telefono es obligatorio';
      }
      if (!$this->mensaje) {
         self::$alertas['error'][] = 'El mensaje es obligatorio';
      }

      return self::$alertas;
   }
}
