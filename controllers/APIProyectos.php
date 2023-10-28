<?php

namespace Controllers;

use Model\Categoria;
use Model\Proyecto;

class APIProyectos
{

   public static function index()
   {
      $proyectos = Proyecto::all();
      echo json_encode($proyectos);
   }

   public static function proyecto()
   {
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id || $id < 1) {
         echo json_encode([]);
         return;
      }

      $proyecto = Proyecto::find($id);
      header('Content-type: application/json');

      echo json_encode($proyecto, JSON_UNESCAPED_SLASHES);
   }

   public static function categoria()
   {
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id || $id < 1) {
         echo json_encode([]);
         return;
      }

      $categoria = Categoria::find($id);
      $proyectos = Proyecto::all();
      $fileList = [];


      foreach ($proyectos as $proyecto) {
         if ($proyecto->categoria_id == $categoria->id) {
            $fileList[] = [
               'id' => $proyecto->id,
               'nombre' => $proyecto->nombre,
               'descripcion' => $proyecto->descripcion,
               'imagen_previa' => $proyecto->imagen_previa,
               'slug' => $proyecto->slug,
               'categoria_id' => $proyecto->categoria_id, // Agregar el ID del proyecto
            ];
         }
         // $proyecto->categoria_id == $categoria->id;
         // debuguear($proyecto);
      }


      header('Content-type: application/json');

      echo json_encode($fileList, JSON_UNESCAPED_SLASHES);
   }
}
