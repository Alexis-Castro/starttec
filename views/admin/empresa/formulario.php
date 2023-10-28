<fieldset class="space-y-8 md:space-y-10 mb-6 md:mb-8">
   <legend class="text-2xl text-[#00C3FF] font-bold underline">Información de la Empresa</legend>

   <div class="grid gap-x-6 gap-y-6 mb-6 md:grid-cols-2 md:gap-y-8">
      <div>
         <label for="nombre" class="block mb-2 text-gray-100 false">Nombre</label>
         <input type="text" id="nombre" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar Nombre" name="nombre" value="<?php echo $empresa->nombre ?? ''; ?>">
      </div>

      <div>
         <label for="telefono" class="block mb-2 text-gray-100">Teléfono</label>
         <input type="tel" id="telefono" name="telefono" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar teléfono" value="<?php echo $empresa->telefono ?? ''; ?>" minlength="7" maxlength="15" pattern="[0-9]+">
      </div>

      <div>
         <label for="email" class="block mb-2 text-gray-100">Correo electrónico</label>
         <input type="email" id="email" name="email" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar email" value="<?php echo $empresa->email ?? ''; ?>">
      </div>

      <div>
         <label for="direccion" class="block mb-2 text-gray-100">Direccion</label>
         <input type="text" id="direccion" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar direccion" name="direccion" value="<?php echo $empresa->direccion ?? ''; ?>">
      </div>

      <div>
         <label class="block mb-2 text-gray-100" for="imagen">Imagen inicio</label>
         <input class="bg-gray-700 border-transparent border cursor-pointer file:bg-azul file:text-gray-200 disabled:cursor-default file:border-0 file:border-collapse file:border-r file:border-solid file:border-stroke file:cursor-pointer file:transition file:hover:bg-[#0b55cf] file:mr-3 file:px-3 file:py-2.5 focus:border-azul-claro outline-none rounded-lg transition w-full text-gray-300" id="imagen_inicio" name="imagen_inicio" type="file" accept="image/*">
         <?php if (isset($empresa->imagen_inicio_actual)) { ?>
            <div class="mt-3">
               <p class="text-[#00C3FF] mb-1">Imagen Actual:</p>
               <div class="formulario__imagen">
                  <picture>
                     <source srcset="<?php echo $_ENV['HOST'] . '/img/empresa/' . $empresa->imagen_inicio; ?>.webp" type="image/webp">
                     <source srcset="<?php echo $_ENV['HOST'] . '/img/empresa/' . $empresa->imagen_inicio; ?>.png" type="image/png">
                     <img src="<?php echo $_ENV['HOST'] . '/img/empresa/' . $empresa->imagen_inicio; ?>.png" alt="Imagen home">
                  </picture>
               </div>
            </div>
         <?php } ?>
      </div>

      <div>

         <label class="block mb-2 text-gray-100" for="video">Video inicio</label>
         <input class="bg-gray-700 border-transparent border cursor-pointer file:bg-azul file:text-gray-200 disabled:cursor-default file:border-0 file:border-collapse file:border-r file:border-solid file:border-stroke file:cursor-pointer file:transition file:hover:bg-[#0b55cf] file:mr-3 file:px-3 file:py-2.5 focus:border-azul-claro outline-none rounded-lg transition w-full text-gray-300" id="video_inicio" name="video_inicio" type="file" accept="video/*">
         <?php if (isset($empresa->video_inicio_actual)) { ?>
            <div class="mt-3">
               <p class="text-[#00C3FF] mb-1">Video Actual:</p>
               <div class="formulario__imagen">
                  <video class="w-full" controls muted>
                     <source src="<?php echo $_ENV['HOST'] . '/video/empresa/' . $empresa->video_inicio; ?>.mp4" type="video/mp4" />
                     <source src="<?php echo $_ENV['HOST'] . '/video/empresa/' . $empresa->video_inicio; ?>.webm" type="video/webm" />
                     <source src="<?php echo $_ENV['HOST'] . '/video/empresa/' . $empresa->video_inicio; ?>.ogg" type="video/ogg" />
                     <img src="imagen.png" alt="Video no soportado" />
                     Su navegador no soporta contenido multimedia.
                  </video>
               </div>
            </div>

         <?php } ?>

      </div>

      <div>
         <label for="ciudad" class="block mb-2 text-gray-100">Ciudad</label>
         <input type="text" id="ciudad" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar ciudad" name="ciudad" value="<?php echo $empresa->ciudad ?? ''; ?>">
      </div>

      <div>
         <label for="clientes" class="block mb-2 text-gray-100">Nro de clientes</label>
         <input type="text" id="clientes" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar clientes" name="nro_clientes" value="<?php echo $empresa->nro_clientes ?? ''; ?>">
      </div>

      <div>
         <label for="proyectos" class="block mb-2 text-gray-100">Nro de proyectos</label>
         <input type="text" id="proyectos" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar proyectos" name="nro_proyectos" value="<?php echo $empresa->nro_clientes ?? ''; ?>">
      </div>

      <div>
         <label for="years" class="block mb-2 text-gray-100">Nro de años</label>
         <input type="text" id="years" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar años" name="nro_years" value="<?php echo $empresa->nro_years ?? ''; ?>">
      </div>


   </div>

</fieldset>