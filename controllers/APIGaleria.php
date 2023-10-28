<?php

namespace Controllers;

use Model\Proyecto;
use Model\ProyectoGaleria;

class APIGaleria
{

   public static function index()
   {
      $proyectos = Proyecto::all();
      echo json_encode($proyectos);
   }

   // public static function proyecto()
   // {
   //    $id = $_GET['id'];
   //    $id = filter_var($id, FILTER_VALIDATE_INT);

   //    if (!$id || $id < 1) {
   //       echo json_encode([]);
   //       return;
   //    }

   //    $proyecto = Proyecto::find($id);
   //    header('Content-type: application/json');
   //    echo json_encode($proyecto, JSON_UNESCAPED_SLASHES);
   // }
   public static function galeria()
   {
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id || $id < 1) {
         echo json_encode([]);
         return;
      }

      $galeria = ProyectoGaleria::obtenerImagenesDeProyecto($id);

      $targetDir = '../public/img/proyectos/galeria/';
      $fileList = [];
      $dir = $targetDir;

      if (is_dir($dir)) {
         if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
               // Evitar archivos vacíos y directorios especiales
               if ($file != '' && $file != '.' && $file != '..') {
                  $file_path = $targetDir . $file;

                  if (!is_dir($file_path)) {
                     $size = filesize($file_path);
                     $fileOutExt = pathinfo($file, PATHINFO_FILENAME);
                     $fileExt = pathinfo($file, PATHINFO_EXTENSION);
                     // $imgs_proyecto = ProyectoGaleria::obtenerImagenesDeProyecto($id); // Obtener el proyecto asociado a la imagen

                     foreach ($galeria as $img_proyecto) {
                        if ($img_proyecto->imagen == $fileOutExt && $fileExt == 'webp') {
                           $fileList[] = [
                              'id' => $img_proyecto->id,
                              'name' => $file,
                              'size' => $size,
                              'path' => $file_path,
                              'project_id' => $img_proyecto->proyecto_id, // Agregar el ID del proyecto
                           ];
                        }
                     }
                  }
               }
            }
            closedir($dh);
         }
      }

      header('Content-type: application/json');

      echo json_encode($fileList, JSON_UNESCAPED_SLASHES);
   }
}
