<?php

namespace Model;

class Empresa extends ActiveRecord
{
   protected static $tabla = 'empresa';
   protected static $columnasDB = ['id', 'nombre', 'telefono', 'email', 'direccion', 'ciudad', 'video_inicio', 'imagen_inicio', 'nro_clientes', 'nro_proyectos', 'nro_years'];

   public $id;
   public $nombre;
   public $telefono;
   public $email;
   public $direccion;
   public $ciudad;
   public $video_inicio;
   public $imagen_inicio;
   public $nro_clientes;
   public $nro_proyectos;
   public $nro_years;

   public $imagen_inicio_actual; // Agregamos la propiedad imagen_inicio_actual
   public $video_inicio_actual; // Agregamos la propiedad video_inicio_actual


   public function __construct($args = [])
   {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->telefono = $args['telefono'] ?? '';
      $this->email = $args['email'] ?? '';
      $this->direccion = $args['direccion'] ?? '';
      $this->ciudad = $args['ciudad'] ?? '';
      $this->imagen_inicio = $args['imagen_inicio'] ?? '';
      $this->video_inicio = $args['video_inicio'] ?? '';
      $this->nro_clientes = $args['nro_clientes'] ?? '';
      $this->nro_proyectos = $args['nro_proyectos'] ?? '';
      $this->nro_years = $args['nro_years'] ?? '';
   }

   public function validar()
   {
      if (!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }
      if (!$this->telefono) {
         self::$alertas['error'][] = 'El telefono es obligatorio';
      }
      if (!$this->email) {
         self::$alertas['error'][] = 'El email es obligatorio';
      }
      if (!$this->direccion) {
         self::$alertas['error'][] = 'El direccion es obligatorio';
      }
      if (!$this->ciudad) {
         self::$alertas['error'][] = 'El ciudad es obligatorio';
      }
      // if (!$this->video_inicio) {
      //    self::$alertas['error'][] = 'El video_inicio es obligatorio';
      // }
      if (!$this->imagen_inicio) {
         self::$alertas['error'][] = 'La imagen es obligatoria';
      }
      if (!$this->nro_clientes) {
         self::$alertas['error'][] = 'El nro de clientes es obligatorio';
      }
      if (!$this->nro_proyectos) {
         self::$alertas['error'][] = 'El nro de proyectos es obligatorio';
      }
      if (!$this->nro_years) {
         self::$alertas['error'][] = 'El El nro de años es obligatorio';
      }


      return self::$alertas;
   }
}
