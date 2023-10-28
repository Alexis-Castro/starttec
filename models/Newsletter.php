<?php

namespace Model;

class Newsletter extends ActiveRecord
{
   protected static $tabla = 'newsletter';
   protected static $columnasDB = ['id', 'email'];

   public $id;
   public $email;
   public $created_at;


   public function validar()
   {
      if (!$this->email) {
         self::$alertas['error'][] = 'El email es obligatorio';
      }

      return self::$alertas;
   }
}
