<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-8">
   <h2 class="text-3xl font-bold text-white">
      <?php echo $titulo ?>
   </h2>

   <?php if (empty($empresa)) { ?>
      <div>
         <a class="btn btn-primary gap-1" href="/admin/empresa/crear">
            <svg class="fill-current" width="20" height="20" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
            Añadir empresa
         </a>
      </div>

   <?php  } ?>

</div>

<div class="relative overflow-x-auto shadow-lg sm:rounded-lg mb-8" id="listado">

   <?php if (!empty($empresa)) { ?>
      <table class="w-full text-left text-gray-300">
         <thead class="text-xs uppercase bg-gray-700 text-gray-300">
            <tr>

               <th scope="col" class="px-6 py-3">
                  Nombre
               </th>
               <th scope="col" class="px-6 py-3">
                  Teléfono
               </th>
               <th scope="col" class="px-6 py-3">
                  Email
               </th>
               <th scope="col" class="px-6 py-3">
                  Dirección
               </th>
               <th scope="col" class="px-6 py-3">
                  Ciudad
               </th>
               <th scope="col" class="px-6 py-3">
                  Nro. de clientes
               </th>
               <th scope="col" class="px-6 py-3">
                  Nro. de proyectos
               </th>
               <th scope="col" class="px-6 py-3">
                  Nro. de años
               </th>
               <th scope="col" class="px-6 py-3">
                  Acciones
               </th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($empresa as $emp) { ?>
               <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-700">

                  <td class="px-6 py-4 text-gray-100 font-semibold">
                     <!-- <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image"> -->
                     <?php echo $emp->nombre ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $emp->telefono ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $emp->email ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $emp->direccion ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $emp->ciudad ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $emp->nro_clientes ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $emp->nro_proyectos ?>
                  </td>
                  <td class="px-6 py-4">
                     <?php echo $emp->nro_years ?>
                  </td>
                  <td class="px-6 py-4">
                     <div class="flex items-center gap-x-3">
                        <a href="/admin/empresa/editar?id=<?php echo $emp->id; ?>" class="btn btn-primary gap-1" title="Editar">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-100" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                              <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                              <path d="M16 5l3 3"></path>
                           </svg>
                           <span class="hidden md:block">Editar</span>
                        </a>

                     </div>
                  </td>
               </tr>
            <?php } ?>

         </tbody>
      </table>
   <?php  } else { ?>
      <p class="text-2xl text-center overflow-hidden text-gray-200">No hay info de empresa registrado</p>
   <?php } ?>

</div>

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