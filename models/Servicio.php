<?php

namespace Model;

class Servicio extends ActiveRecord
{
   protected static $tabla = 'servicios';
   protected static $columnasDB = ['id', 'titulo', 'descripcion', 'imagen', 'slug'];

   public $id;
   public $titulo;
   public $descripcion;
   public $imagen;
   public $slug;

   public $imagen_actual; // Agregamos la propiedad imagen_actual


   public function __construct($args = [])
   {
      $this->id = $args['id'] ?? null;
      $this->titulo = $args['titulo'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->imagen = $args['imagen'] ?? '';
      $this->slug = $args['slug'] ?? '';
   }

   public function validar()
   {
      if (!$this->titulo) {
         self::$alertas['error'][] = 'El titulo es obligatorio';
      }
      if (!$this->descripcion) {
         self::$alertas['error'][] = 'El descripcion es obligatoria';
      }
      if (!$this->imagen) {
         self::$alertas['error'][] = 'La imagen es obligatoria';
      }
      if (!$this->slug) {
         self::$alertas['error'][] = 'El slug es obligatorio';
      }

      return self::$alertas;
   }
}
