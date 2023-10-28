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
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Estamos aquí para ti</h2>
      </div>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3  place-content-center my-6 gap-x-6 gap-y-8 xl:gap-x-4">
         <article class="relative flex flex-col items-center justify-center w-80 sm:w-full xl:w-4/5 2xl:w-auto mx-auto p-2 transition duration-300 rounded-md shadow-lg hover:shadow-xl bg-white group">
            <div class=" w-full px-6 py-8 2xl:py-6 rounded transition text-center">
               <figure class="flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-azul" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor"></path>
                  </svg>

               </figure>
               <h3 class="font-semibold text-xl mt-1">Dirección</h3>
               <p class="font-open mt-4"><?php echo $empresa->direccion; ?></p>
               <p class="font-open"><?php echo $empresa->ciudad; ?></p>

            </div>
         </article>

         <article class="relative flex flex-col items-center justify-center w-80 sm:w-full xl:w-4/5 2xl:w-auto mx-auto p-2 transition duration-300 rounded-md shadow-lg hover:shadow-xl bg-white group">
            <div class=" w-full px-6 py-8 2xl:py-6 rounded transition text-center">
               <figure class="flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-azul" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M9 3a1 1 0 0 1 .877 .519l.051 .11l2 5a1 1 0 0 1 -.313 1.16l-.1 .068l-1.674 1.004l.063 .103a10 10 0 0 0 3.132 3.132l.102 .062l1.005 -1.672a1 1 0 0 1 1.113 -.453l.115 .039l5 2a1 1 0 0 1 .622 .807l.007 .121v4c0 1.657 -1.343 3 -3.06 2.998c-8.579 -.521 -15.418 -7.36 -15.94 -15.998a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" stroke-width="0" fill="currentColor"></path>
                  </svg>

               </figure>
               <h3 class="font-semibold text-xl mt-1">Teléfono</h3>
               <p class="font-open mt-4">+51 <?php echo $empresa->telefono; ?></p>

            </div>
         </article>

         <article class="relative flex flex-col items-center justify-center w-80 sm:w-full xl:w-4/5 2xl:w-auto mx-auto p-2 transition duration-300 rounded-md shadow-lg hover:shadow-xl bg-white group">
            <div class=" w-full px-6 py-8 2xl:py-6 rounded transition text-center">
               <figure class="flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-azul" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" stroke-width="0" fill="currentColor"></path>
                     <path d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" stroke-width="0" fill="currentColor"></path>
                  </svg>

               </figure>
               <h3 class="font-semibold text-xl mt-1">Email</h3>
               <p class="font-open mt-4"><?php echo $empresa->email; ?></p>

            </div>
         </article>
      </div>
   </div>
</section>

<section class="pt-12 pb-6 lg:pt-24 lg:pb-10">
   <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
      <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Ubícanos</h2>
   </div>

   <div id="mapa" class="h-96 md:h-[30rem]"></div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">¿Tienes preguntas en mente? ¡Déjanos ayudarte!</h2>
      </div>

      <div class="lg:flex items-center gap-6 my-6 xl:gap-x-4">
         <div class="basis-0 block flex-grow flex-shrink p-3 md:max-w-xl md:mx-auto">
            <figure class="flex items-center justify-center">
               <img class="object-cover transition duration-200 group-hover:scale-125 xl:max-w-[30rem]" src="build/img/send_message.svg" alt="Estudio y Análisis">
            </figure>
         </div>
         <div class="basis-0 block flex-grow flex-shrink p-3 md:max-w-xl md:mx-auto">
            <form id="formulario" class="p-8 shadow-xl rounded-lg" method="post">
               <div class="mb-3 p-2">
                  <h3 class="text-3xl lg:text-4xl mb-3 text-center ">Envíanos un mensaje</h3>
               </div>
               <div class="grid gap-4 mb-6 md:grid-cols-2 p-2">
                  <div class="">
                     <label for="nombres" class="block mb-2 text-lg font-medium text-gray-900">Nombres</label>
                     <input type="text" name="nombres" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" id="nombres" required>
                  </div>
                  <div class="">
                     <label for="asunto" class="block mb-2 text-lg font-medium text-gray-900">Asunto</label>
                     <input type="text" name="asunto" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" id="asunto" required>
                  </div>
                  <div class="">
                     <label for="email" class="block mb-2 text-lg font-medium text-gray-900">Correo</label>
                     <input type="email" name="email" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" id="email" required>
                  </div>

                  <div class="">
                     <label for="telefono" class="block mb-2 text-lg font-medium text-gray-900">Teléfono</label>
                     <input type="telefono" name="telefono" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" id="telefono" required>
                  </div>

                  <div class="md:col-span-2">
                     <label for="mensaje-contacto" class="block mb-2 text-lg font-medium text-gray-900">Mensaje</label>
                     <textarea id="mensaje-contacto" class="w-full outline-none transition-colors focus-visible:shadow-none py-2 px-2.5 border border-gray-300 focus:ring-blue-900 focus:border-azul rounded font-open" rows="5" name="mensaje" required></textarea>
                  </div>
                  <div class="md:col-span-2">
                     <div class="lg:text-sm flex items-center">
                        <!-- <div class="md:inline-flex items-center"> -->
                        <input id="terminos" type="checkbox" class="w-4 h-4 transition accent-cyan-ak text-cyan-ak bg-gray-100 rounded ring-offset-gray-800 border-gray-300 focus:ring-cyan-ak focus:ring-2" required>
                        <label for="terminos" class="ml-2 font-medium mr-1">
                           He leído y acepto los
                           <a href="https://ayllukaypi.pe/terminos_condiciones" target="_blank" rel="noopener noreferrer" class="hover:underline cursor-pointer text-azul font-bold js-modal-trigger">Términos y Condiciones </a>
                        </label>

                     </div>
                  </div>
               </div>

               <div class="">
                  <button type="submit" class="btn btn-primary w-full uppercase shadow-xl flex items-center justify-center submit">
                     <svg aria-hidden="true" role="status" class="mr-3 w-5 h-5 text-white animate-spin hidden" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                     </svg>
                     Enviar
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>