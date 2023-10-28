<fieldset class="space-y-4 md:space-y-6 mb-6 md:mb-8">
   <legend class="text-2xl text-[#00C3FF] font-bold underline">Información Proyecto</legend>

   <div class="grid gap-6 mb-6 md:grid-cols-2">
      <div>
         <label for="nombre" class="block mb-2 text-gray-100 false">Nombre del Proyecto</label>
         <input type="text" id="nombre" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar Nombre Proyecto" name="nombre" value="<?php echo $proyecto->nombre ?? ''; ?>">
      </div>

      <div class="">
         <label for="slug" class="block mb-2 text-gray-100 false">URL amigable</label>
         <input type="text" id="slug" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar URL amigable" name="slug" value="<?php echo $proyecto->slug ?? ''; ?>" required>
      </div>

      <div class="col-span-2">
         <label for="categoria" class="block mb-2 text-gray-100">Elije la categoría del proyecto</label>
         <select name="categoria_id" id="categoria" class="rounded-lg flex-1 border-transparent appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent cursor-pointer">
            <option value="">Seleccionar categoria</option>


            <?php foreach ($categorias as $categoria) { ?>
               <option <?php echo ($proyecto->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
         </select>
      </div>

      <div class="col-span-2">
         <label for="video" class="block mb-2 text-gray-100">Vídeo</label>

         <div class="relative w-full mb-3">
            <input type="url" id="video" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="URL del video de YT" name="link_video" value="<?php echo $proyecto->link_video ?? ''; ?>">
            <button type="button" class="absolute top-0 right-0 h-full btn btn-primary rounded-l-none px-3" id="btn-video">
               <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
               </svg>
               <span class="sr-only">Buscar</span>
            </button>
         </div>
         <div id="video-container"></div>
      </div>

      <div class="col-span-2">
         <label for="imagen" class="block mb-2 text-gray-100">Imagen Previa</label>
         <input class="bg-gray-700 border-transparent border cursor-pointer file:bg-azul file:text-gray-200 disabled:cursor-default file:border-0 file:border-collapse file:border-r file:border-solid file:border-stroke file:cursor-pointer file:transition file:hover:bg-[#0b55cf] file:mr-3 file:px-3 file:py-2.5 focus:border-azul-claro outline-none rounded-lg transition w-full text-gray-300 mb-3" id="imagen" name="imagen_previa" type="file" accept="image/*">
         <div>
            <?php if (isset($proyecto->imagen_previa_actual)) { ?>
               <p class="text-[#00C3FF]">Imagen Actual:</p>
               <div class="formulario__imagen">
                  <picture>
                     <source srcset="<?php echo $_ENV['HOST'] . '/img/proyectos/imagen_previa/' . $proyecto->imagen_previa; ?>.webp" type="image/webp">
                     <source srcset="<?php echo $_ENV['HOST'] . '/img/proyectos/imagen_previa/' . $proyecto->imagen_previa; ?>.png" type="image/png">
                     <img src="<?php echo $_ENV['HOST'] . '/img/proyectos/imagen_previa/' . $proyecto->imagen_previa; ?>.png" alt="Imagen Proyecto">
                  </picture>
               </div>

            <?php } ?>

         </div>
      </div>

      <div class="col-span-2">
         <p class="block mb-2 text-gray-100">Galería</p>
         <div id="dropzone-file" class="dropzone flex flex-wrap items-center justify-center w-full min-h-[224px] !border-2 !border-dashed !rounded-lg cursor-pointer bg-gray-700 !border-gray-600 hover:border-gray-500 hover:bg-gray-600">
            <!-- <div class="flex flex-col items-center justify-center pt-5 pb-6">

               <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-4 text-gray-400" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                  <path d="M9 15l3 -3l3 3"></path>
                  <path d="M12 12l0 9"></path>
               </svg>
               <p class="mb-2 text-sm text-gray-400"><span class="font-semibold">Haga click</span> o arraste y suelte las imágenes</p>
               <p class="text-xs text-gray-400">PNG, JPG, JPEG (MAX. 1920x1080 & 2MB)</p>
            </div> -->
         </div>
         <!-- <input id="dropzone-file" type="file" class=" hidden dropzone" accept="image/*" /> -->

      </div>

      <div class="col-span-2">
         <label for="descripcion" class="block mb-2 text-gray-100">Descripción</label>
         <!-- <div id="toolbar"></div> -->
         <div id="descripcion" class="appearance-none rounded-b-lg !border bg-gray-700 !border-gray-600 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" style="height: 300px;">
            <?php echo $proyecto->descripcion ?? ''; ?>
         </div>
      </div>

   </div>

</fieldset>