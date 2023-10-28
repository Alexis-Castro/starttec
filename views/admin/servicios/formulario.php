<fieldset class="space-y-4 md:space-y-6 mb-6 md:mb-8">
   <legend class="text-2xl text-[#00C3FF] font-bold underline">Información Servicios</legend>

   <div class="grid gap-6 mb-6 md:grid-cols-1">
      <div class="">
         <label for="titulo" class="block mb-2 text-gray-100 false">Título</label>
         <input type="text" id="titulo" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar título" name="titulo" value="<?php echo $servicios->titulo ?? ''; ?>">
      </div>

      <div class="">
         <label for="slug" class="block mb-2 text-gray-100 false">URL amigable</label>
         <input type="text" id="slug" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar URL amigable" name="slug" value="<?php echo $servicios->slug ?? ''; ?>">
      </div>

      <div class="">
         <label for="descripcion" class="block mb-2 text-gray-100">Descripción</label>

         <textarea id="descripcion" rows="4" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Escribe una descripcion" name="descripcion"><?php echo $servicios->descripcion ?? ''; ?></textarea>
      </div>

      <div class="">
         <label class="block mb-2 text-gray-100" for="imagen">Imagen</label>
         <input class="bg-gray-700 border-transparent border cursor-pointer file:bg-azul file:text-gray-200 disabled:cursor-default file:border-0 file:border-collapse file:border-r file:border-solid file:border-stroke file:cursor-pointer file:transition file:hover:bg-[#0b55cf] file:mr-3 file:px-3 file:py-2.5 focus:border-azul-claro outline-none rounded-lg transition w-full text-gray-300 mb-3" id="imagen" name="imagen" type="file" accept="image/*">

         <div>
            <?php if (isset($servicios->imagen_actual)) { ?>
               <p class="text-[#00C3FF]">Imagen Actual:</p>
               <div class="formulario__imagen">
                  <picture>
                     <source srcset="<?php echo $_ENV['HOST'] . '/img/servicios/' . $servicios->imagen; ?>.webp" type="image/webp">
                     <source srcset="<?php echo $_ENV['HOST'] . '/img/servicios/' . $servicios->imagen; ?>.png" type="image/png">
                     <img src="<?php echo $_ENV['HOST'] . '/img/servicios/' . $servicios->imagen; ?>.png" alt="Imagen Servicio">
                  </picture>
               </div>

            <?php } ?>

         </div>
      </div>

   </div>


</fieldset>