<section class="h-screen relative z-10">
   <div class="w-full h-full absolute py-12 px-6 lg:py-24 lg:px-14 ">
      <div class="w-full h-full flex items-center justify-center mx-auto lg:max-w-5xl xl:max-w-7xl">
         <div class="block basis-0 shrink p-2 grow z-10 relative text-center text-gray-50">
            <h2 class="font-bold text-4xl lg:text-6xl [text-wrap:balance] tracking-tight"> <?php echo $titulo ?> </h2>
         </div>
      </div>
   </div>

   <div class="z-10 absolute left-1/2 -translate-x-1/2 -translate-y-1/2 bottom-10 w-8 h-12 border-2 border-solid border-white rounded-full cursor-pointer before:absolute before:bottom-8 before:left-1/2 before:w-2 before:h-2 before:-ml-1 before:bg-white before:rounded-full before:animate-scrolldown before:shadow-md ">
      <div class="chevrons pt-3 px-0 pb-0 -m-1 mt-12 flex flex-col items-center">
         <div class="chevrondown -mt-1.5 relative border-t-0 border-r-2 border-b-2 border-l-0 inline-block w-2.5 h-2.5 rotate-45 odd:animate-pulse54 even:animate-[pulse54_500ms_ease_infinite_alternate_250ms]"></div>
         <div class="chevrondown -mt-1.5 relative border-t-0 border-r-2 border-b-2 border-l-0 inline-block w-2.5 h-2.5 rotate-45 odd:animate-pulse54 even:animate-[pulse54_500ms_ease_infinite_alternate_250ms]"></div>
      </div>
   </div>

   <div class="overflow-hidden relative w-full h-full ">
      <div class="bg-[url(/build/img/servicios-fondo.webp)] absolute h-full bg-center bg-no-repeat bg-fixed bg-cover min-w-[calc(100%+50px)] max-w-none before:inset-0 before:absolute before:bg-[rgba(0,0,0,.52)]">
      </div>
   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14 bg-gray-50">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center mb-8">
         <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Solicita cotización para realizar tu Proyecto</h2>
         <p class="font-open">Te haremos llegar en breve, la cotización solicitada a tu correo electrónico.</p>
      </div>

      <div class="basis-0 block flex-grow flex-shrink p-3 md:max-w-xl md:mx-auto">
         <form id="cotizacion" class="p-8 shadow-xl rounded-lg" method="post">

            <div class="grid gap-4 md:grid-cols-2 p-2">
               <div class="md:col-span-2">
                  <label for="nombres" class="block mb-2 text-lg font-medium text-gray-950">Nombres</label>
                  <input type="text" name="nombres" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" id="nombres" required="">
               </div>

               <div class="md:col-span-2">
                  <label for="email" class="block mb-2 text-lg font-medium text-gray-950">Correo</label>
                  <input type="email" name="email" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" id="email" required="">
               </div>

               <div class="md:col-span-2">
                  <label for="telefono" class="block mb-2 text-lg font-medium text-gray-950">Teléfono</label>
                  <input type="telefono" name="telefono" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" id="telefono" required="">
               </div>

               <div class="md:col-span-2">
                  <label for="servicio" class="block mb-2 text-lg font-medium text-gray-950">Qué servicio te interesa</label>
                  <select class="w-full rounded text-base py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul cursor-pointer" name="servicio" id="servicio" required>
                     <option value="" selected>Seleccionar servicio</option>

                     <?php foreach ($servicios as $servicio) { ?>
                        <?php if ($servicio->titulo !== 'Venta de Equipos') { ?>
                           <option value="<?php echo $servicio->titulo; ?>"><?php echo $servicio->titulo; ?></option>
                        <?php } ?>
                     <?php } ?>
                  </select>
               </div>

               <div class="md:col-span-2">
                  <label for="descripcion" class="block mb-2 text-lg font-medium text-gray-900">Mensaje</label>
                  <textarea id="descripcion" class="w-full outline-none transition-colors focus-visible:shadow-none py-2 px-2.5 border border-gray-300 focus:ring-blue-900 focus:border-azul rounded font-open" rows="5" name="descripcion" required=""></textarea>
               </div>

               <div class="md:col-span-2">
                  <button type="submit" class="btn btn-primary w-full uppercase shadow-xl flex items-center justify-center submit">
                     <svg aria-hidden="true" role="status" class="mr-3 w-5 h-5 text-white animate-spin hidden" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                     </svg>
                     Enviar
                  </button>
               </div>
            </div>

         </form>
      </div>
   </div>
</section>