<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-8">
   <h2 class="text-3xl font-bold text-white">
      <?php echo $titulo ?>
   </h2>


</div>

<div class="relative overflow-x-auto shadow-lg sm:rounded-lg mb-8" id="listado-cotizaciones">
   <?php if (!empty($cotizaciones)) { ?>
      <table class="w-full text-left text-gray-300">
         <thead class="text-xs uppercase bg-gray-700 text-gray-300">
            <tr>

               <th scope="col" class="px-6 py-3">
                  Nombres
               </th>
               <th scope="col" class="px-6 py-3">
                  Correo
               </th>
               <th scope="col" class="px-6 py-3">
                  Teléfono
               </th>
               <th scope="col" class="px-6 py-3">
                  Servicio
               </th>
               <th scope="col" class="px-6 py-3">
                  Descripción
               </th>
               <th scope="col" class="px-6 py-3">
                  Fecha registro
               </th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($cotizaciones as $cotizacion) : ?>
               <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-700">

                  <td class="px-6 py-4 text-gray-100 font-semibold">
                     <?php echo $cotizacion->nombres ?>
                  </td>
                  <td class="px-6 py-4 ">
                     <?php echo $cotizacion->email ?>
                  </td>
                  <td class="px-6 py-4 ">
                     <?php echo $cotizacion->telefono ?>
                  </td>
                  <td class="px-6 py-4 ">
                     <?php echo $cotizacion->servicio ?>
                  </td>
                  <td class="px-6 py-4 ">
                     <div class="line-clamp-3">
                        <?php echo $cotizacion->descripcion ?>
                     </div>
                  </td>
                  <td class="px-6 py-4 ">
                     <?php echo (new DateTime($cotizacion->created_at))->format('d/m/Y h:i')  ?>
                  </td>

               </tr>
            <?php endforeach; ?>

         </tbody>
      </table>
   <?php  } ?>
</div>

<!-- PAGINACIÓN -->
<div class="flex items-center justify-between border-t border-gray-700 px-4 py-3 sm:px-6">
   <div class="flex flex-1 justify-between sm:hidden">
      <?php if ($paginacion->enlace_anterior()) { ?>
         <a class="btn btn-primary gap-2" href="?page=<?php echo $paginacion->pagina_anterior() ?>">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            Anterior
         </a>
      <?php }
      if ($paginacion->enlace_siguiente()) { ?>

         <a class="btn btn-primary gap-2" href="?page=<?php echo $paginacion->pagina_siguiente() ?>">
            Siguiente
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
         </a>
      <?php } ?>
   </div>

   <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
         <p class="text-gray-400">
            Mostrando del
            <span class="font-medium text-gray-200"><?php echo $paginacion->offset() + 1 ?></span>
            al

            <?php if ($paginacion->offset() + 1 === $paginacion->total_registros) { ?>
               <span class="font-medium text-gray-200"><?php echo $paginacion->offset() + 1 ?></span>
            <?php } else if ($paginacion->registros_por_pagina > $paginacion->total_registros) { ?>
               <span class="font-medium text-gray-200"><?php echo $paginacion->total_registros ?></span>
            <?php } else { ?>
               <span class="font-medium text-gray-200"><?php echo $paginacion->offset() + $paginacion->registros_por_pagina ?></span>
            <?php } ?>
            de
            <span class="font-medium text-gray-200"><?php echo $paginacion->total_registros ?></span>
            registros
         </p>
      </div>
      <div>
         <nav class="rounded-md shadow-sm" aria-label="Pagination">
            <ul class="flex items-center -space-x-px h-10 ">
               <?php
               echo $paginacion->paginacion();
               ?>
            </ul>
         </nav>

      </div>
   </div>
</div>