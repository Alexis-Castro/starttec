<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-8">
   <h2 class="text-3xl font-bold text-white">
      <?php echo $titulo ?>
   </h2>

   <div>
      <a class="btn btn-primary gap-1" href="/admin/proyectos/crear">

         <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 5l0 14"></path>
            <path d="M5 12l14 0"></path>
         </svg>
         Añadir proyectos
      </a>
   </div>

</div>

<div class="relative overflow-x-auto shadow-lg sm:rounded-lg mb-8" id="listado-proyectos">
   <?php if (!empty($proyectos)) { ?>
      <table class="w-full text-left text-gray-300">
         <thead class="text-xs uppercase bg-gray-700 text-gray-300">
            <tr>

               <th scope="col" class="px-6 py-3">
                  N°
               </th>
               <th scope="col" class="px-6 py-3">
                  Nombre
               </th>
               <th scope="col" class="px-6 py-3">
                  URL Amigable
               </th>
               <th scope="col" class="px-6 py-3">
                  Video
               </th>
               <th scope="col" class="px-6 py-3">
                  Descripcion
               </th>

               <th scope="col" class="px-6 py-3">
                  Acciones
               </th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($proyectos as $key => $proyecto) : ?>
               <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-700">
                  <td class="px-6 py-4 text-gray-100 font-semibold">
                     <?php echo $key + 1 ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $proyecto->nombre ?>
                  </td>
                  <td class="px-6 py-4 ">
                     <?php echo $proyecto->slug ?>
                  </td>
                  <td class="px-6 py-4">
                     <div class="line-clamp-3">
                        <?php echo $proyecto->descripcion ?>
                     </div>
                  </td>
                  <td class="px-6 py-4  font-semibold ">
                     <a class="p-3 btn bg-gray-600 hover:bg-[#464f5d] gap-x-1 text-gray-100" href="<?php echo $proyecto->link_video ?>" target="_blank">
                        <span>Ver vídeo</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                           <path d="M11 13l9 -9"></path>
                           <path d="M15 4h5v5"></path>
                        </svg>
                     </a>
                  </td>

                  <td class="px-6 py-4">
                     <div class="flex items-center gap-x-3">
                        <a class="btn btn-primary gap-1" href="/admin/proyectos/editar?id=<?php echo $proyecto->id; ?>" title="Editar">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-100" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                              <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                              <path d="M16 5l3 3"></path>
                           </svg>
                           <span class="hidden md:block">Editar</span>
                        </a>

                        <form method="POST" class="btn-eliminar">
                           <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
                           <button type="submit" class="btn btn-danger" title="Eliminar">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-100" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M4 7l16 0"></path>
                                 <path d="M10 11l0 6"></path>
                                 <path d="M14 11l0 6"></path>
                                 <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                 <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                              </svg>
                              <span class="hidden md:block">Eliminar</span>
                           </button>

                        </form>

                     </div>
                  </td>
               </tr>
            <?php endforeach ?>

         </tbody>
      </table>
   <?php  } else { ?>
      <div class="shadow-xl p-14 bg-gray-800">
         <p class="text-2xl text-center overflow-hidden text-gray-200">No hay proyectos registrados(a), empieza <span class="text-azul-claro">agregando</span> uno(a).</p>

      </div>
   <?php } ?>
</div>

<?php if (!empty($proyectos)) { ?>
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

<?php  } ?>