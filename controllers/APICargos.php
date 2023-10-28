<?php

namespace Controllers;

use Model\Cargo;

class APICargos
{

   public static function index()
   {
      $cargos = Cargo::all();
      echo json_encode($cargos);
   }

   public static function cargo()
   {
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id || $id < 1) {
         echo json_encode([]);
         return;
      }

      $cargo = Cargo::find($id);
      echo json_encode($cargo, JSON_UNESCAPED_SLASHES);
   }
}
