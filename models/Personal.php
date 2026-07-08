<?php

namespace Model;

class Personal extends ActiveRecord
{
   protected static $tabla = 'personal';
   protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'telefono', 'imagen', 'cargo_id', 'redes'];

   public $id;
   public $nombre;
   public $apellido;
   public $email;
   public $telefono;
   public $imagen;
   public $cargo_id;
   public $redes;
   public $imagen_actual; // Agregamos la propiedad imagen_actual

   public function __construct($args = [])
   {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->apellido = $args['apellido'] ?? '';
      $this->email = $args['email'] ?? '';
      $this->telefono = $args['telefono'] ?? '';
      $this->imagen = $args['imagen'] ?? '';
      // $this->imagen_actual = $args['imagen'] ?? '';
      $this->cargo_id = $args['cargo_id'] ?? '';
      $this->redes = $args['redes'] ?? '';
   }

   public function validar()
   {
      if (!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }
      if (!$this->apellido) {
         self::$alertas['error'][] = 'El apellido es obligatorio';
      }
      if (!$this->email) {
         self::$alertas['error'][] = 'El email es obligatorio';
      }
      if (!$this->telefono) {
         self::$alertas['error'][] = 'El teléfono es obligatorio';
      }
      if (!$this->imagen) {
         self::$alertas['error'][] = 'La imagen es obligatoria';
      }
      if (!$this->cargo_id || !filter_var($this->cargo_id, FILTER_VALIDATE_INT)) {
         self::$alertas['error'][] = 'El cargo es obligatorio';
      }


      return self::$alertas;
   }
}
