   <?php
   foreach ($alertas as $key => $alerta) {
      foreach ($alerta as $mensaje) {
   ?>
         <div class="border-l-[6px] text-gray-800 text-center py-2 px-4 rounded font-bold text-sm uppercase mb-3 last:mb-6 <?php echo $key; ?>"><?php echo $mensaje; ?></div>
   <?php
      }
   }
   ?>