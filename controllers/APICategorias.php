<?php

namespace Controllers;

use Model\Categoria;

class APICategorias
{

   public static function index()
   {
      $categorias = Categoria::all();
      echo json_encode($categorias);
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
      echo json_encode($categoria, JSON_UNESCAPED_SLASHES);
   }
}
