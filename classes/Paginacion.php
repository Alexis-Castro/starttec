<?php

namespace Classes;

class Paginacion
{
   public $pagina_actual;
   public $registros_por_pagina;
   public $total_registros;

   public function __construct($pagina_actual = 1, $registros_por_pagina = 10, $total_registros = 0)
   {
      $this->pagina_actual = (int) $pagina_actual;
      $this->registros_por_pagina = (int) $registros_por_pagina;
      $this->total_registros = (int) $total_registros;
   }

   public function offset()
   {
      return $this->registros_por_pagina * ($this->pagina_actual - 1);
   }

   public function total_paginas()
   {
      $total = ceil($this->total_registros / $this->registros_por_pagina);
      $total == 0 ? $total = 1 : $total = $total;
      return $total;
   }

   public function pagina_anterior()
   {
      $anterior = $this->pagina_actual - 1;
      return ($anterior > 0) ? $anterior : false;
   }

   public function pagina_siguiente()
   {
      $siguiente = $this->pagina_actual + 1;
      return ($siguiente <= $this->total_paginas()) ? $siguiente : false;
   }

   public function enlace_anterior()
   {
      $html = '';
      if ($this->pagina_anterior()) {
         $html .= "<a class=\"flex items-center justify-center px-4 h-10 ml-0 leading-tight border rounded-l-lg bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white\" href=\"?page={$this->pagina_anterior()}\">";
         $html .= "<span class=\"sr-only\">Anterior</span>";
         $html .= "<svg class=\"w-2.5 h-2.5\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 6 10\"><path stroke=\"currentColor\" stroke-linecap='round' stroke-linejoin=\"round\" stroke-width='2' d=\"M5 1 1 5l4 4\"/></svg>";
         $html .= "</a>";
      }
      return $html;
   }

   public function enlace_siguiente()
   {
      $html = '';
      if ($this->pagina_siguiente()) {
         $html .= "<a class=\"flex items-center justify-center px-4 h-10 leading-tight border rounded-r-lg bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white\" href=\"?page={$this->pagina_siguiente()}\">";
         $html .= "<span class=\"sr-only\">Siguiente</span>";
         $html .= "<svg class=\"w-2.5 h-2.5\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 6 10\"><path stroke=\"currentColor\" stroke-linecap='round' stroke-linejoin=\"round\" stroke-width='2' d=\"m1 9 4-4-4-4\"/></svg>";
         $html .= "</a>";
      }
      return $html;
   }

   public function numeros_paginas()
   {
      $html = '';
      for ($i = 1; $i <= $this->total_paginas(); $i++) {
         if ($i === $this->pagina_actual) {
            $html .= "<li>";
            $html .= "<a aria-current=\"page\" class=\"z-10 flex items-center justify-center px-4 h-10 leading-tight border-gray-700 bg-gray-700 text-white \">{$i}</a>";
            $html .= "</li>";
         } else {
            $html .= "<li>";
            $html .= "<a class=\"flex items-center justify-center px-4 h-10 leading-tight border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white\" href=\"?page={$i}\">{$i}</a>";
            $html .= "</li>";
         }
      }

      return $html;
   }

   public function paginacion()
   {
      $html = '';
      if ($this->total_registros > 1) {

         $html .= "<li>{$this->enlace_anterior()}</li>";
         $html .= $this->numeros_paginas();
         $html .= "<li>{$this->enlace_siguiente()}</li>";
      }

      return $html;
   }
}
