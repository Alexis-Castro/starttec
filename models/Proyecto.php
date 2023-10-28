<?php

namespace Model;

class Proyecto extends ActiveRecord
{
   protected static $tabla = 'proyectos';
   protected static $columnasDB = ['id', 'nombre', 'descripcion', 'link_video', 'imagen_previa', 'slug', 'categoria_id'];

   public $id;
   public $nombre;
   public $descripcion;
   public $link_video;
   public $imagen_previa;
   public $slug;
   public $categoria_id;
   public $imagen_previa_actual; // Agregamos la propiedad imagen_previa_actual

   public function __construct($args = [])
   {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->link_video = $args['link_video'] ?? '';
      $this->imagen_previa = $args['imagen_previa'] ?? '';
      $this->slug = $args['slug'] ?? '';
      $this->categoria_id = $args['categoria_id'] ?? '';
   }

   public function validar()
   {
      if (!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }
      if (!$this->descripcion) {
         self::$alertas['error'][] = 'El descripcion es obligatorio';
      }
      if (!$this->link_video) {
         self::$alertas['error'][] = 'El link del video es obligatorio';
      }
      if (!$this->imagen_previa) {
         self::$alertas['error'][] = 'La imagen es obligatoria';
      }
      if (!$this->slug) {
         self::$alertas['error'][] = 'El slug es obligatorio';
      }
      if (!$this->categoria_id || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
         self::$alertas['error'][] = 'La categoria es obligatoria';
      }


      return self::$alertas;
   }
}
