<section class="bg-homepage-hero-after h-screen relative z-10">
   <div class="w-full h-full absolute py-12 px-6 lg:py-24 lg:px-14 ">
      <div class="w-full h-full flex items-center justify-center lg:justify-start mx-auto lg:max-w-5xl xl:max-w-7xl">
         <div class="block basis-0 shrink p-2 grow z-10 relative text-center lg:text-left md:flex-none md:w-7/12">
            <p class="font-bold text-white text-4xl lg:text-6xl [text-wrap:balance]">
               Desarrollo de
            </p>
            <div id="typed-strings" class=" ">
               <p>Software a Medida</p>
               <p>Páginas Web</p>
               <p>Sitios Web Administrables</p>
               <p>Sistemas Multiplataforma</p>
            </div>
            <h1 class="sr-only">Desarrollo de Software a medida</h1>
            <span id="typed" class="text-4xl lg:text-6xl font-bold text-celeste"></span>
            <p class="text-white lg:pr-24">
               Start Tec te da la bienvenida, si estás buscando diseñar tu página web o necesitas algún sistema para tu empresa, nosotros podemos realizar lo que necesites
            </p>
            <div class="mt-5 md:mt-6 flex justify-center lg:justify-start gap-4">
               <a href="#inicio" id="conoce" class="btn btn-primary uppercase">
                  Leer Más
               </a>
               <a href="#inicio" id="conoce" class="btn btn-celeste uppercase">
                  Conócenos
               </a>
            </div>
         </div>
      </div>
   </div>

   <div class="overflow-hidden relative w-full h-full ">
      <div style="background-image: url('/img/empresa/<?php echo $empresa->imagen_inicio; ?>.webp');" class="absolute h-full bg-center bg-no-repeat bg-cover min-w-[calc(100%+50px)] max-w-none before:inset-0 before:absolute bg-hero before:bg-[rgba(0,0,0,.3)]">
      </div>
   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14 bg-gray-50">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center justify-center">
         <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
            <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Nuestros Servicios</h2>
            <p class="font-open">Te ofrecemos diferentes servicios, garantizándote un trabajo de calidad de acuerdo a lo que necesites.</p>
         </div>
      </div>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 2xl:grid-cols-4 place-content-center my-6 gap-x-6 gap-y-8 xl:gap-x-4">
         <?php foreach ($servicios as $servicio) { ?>
            <article class="relative flex flex-col items-center justify-center w-80 sm:w-full xl:w-4/5 2xl:w-auto mx-auto p-2 transition duration-300 rounded-md shadow-lg hover:shadow-xl bg-white group">
               <div class=" w-full px-6 py-8 2xl:py-6 rounded transition text-center">
                  <figure class="flex items-center justify-center">
                     <img class="object-cover w-14 h-14 transition duration-200 group-hover:scale-125" src="/img/servicios/<?php echo $servicio->imagen; ?>.webp" alt="<?php echo $servicio->titulo; ?>">

                  </figure>
                  <h3 class="font-semibold text-xl my-3"><?php echo $servicio->titulo; ?></h3>
                  <p class="font-open mb-3"><?php echo $servicio->descripcion; ?></p>
                  <div class="flex items-center justify-center">
                     <a href="/servicio/<?php echo getSlugify($servicio->titulo); ?>" class="btn group-hover:btn-primary duration-300 rounded-full font-open uppercase justify-center gap-x-2 group-hover:gap-x-4 transition-all font-bold">
                        Leer Más
                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M5 12l14 0"></path>
                           <path d="M15 16l4 -4"></path>
                           <path d="M15 8l4 4"></path>
                        </svg>
                     </a>
                  </div>
               </div>
            </article>

         <?php } ?>
      </div>
   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center justify-center">
         <div class="basis-0 block flex-grow flex-shrink p-3">
            <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mr-auto">Si tienes alguna pregunta, por favor contáctanos.</h2>
            <p class="font-open">Te ofrecemos diferentes servicios, garantizándote un trabajo de calidad de acuerdo a lo que necesites.</p>
            <div class="mt-5 md:mt-6 flex justify-center lg:justify-start gap-4">
               <a href="/nosotros" id="conoce" class="btn btn-primary uppercase">
                  Leer Más
               </a>
               <a href="/contacto" id="conoce" class="btn border border-gray-200 uppercase">
                  Contáctenos
               </a>
            </div>
         </div>
         <div class="basis-0 block flex-grow flex-shrink p-3">
            <figure class="relative">
               <img src="build/img/virtual-interviews.svg" alt="Reunion Virtual">
            </figure>
         </div>
      </div>
   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14 bg-center bg-no-repeat bg-cover max-w-none bg-why ">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center justify-center gap-x-4 lg:gap-x-6 2xl:gap-x-12">
         <div class="basis-0 block flex-grow flex-shrink p-3">
            <div class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 place-content-center">
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-3xl md:text-5xl my-3">+ <?php echo $empresa->nro_proyectos ?></h4>
                     <p class="font-open mb-3">Proyectos realizados por nuestro equipo de diseñadores y desarrolladores web.</p>
                  </div>
               </article>
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-3xl md:text-5xl my-3">+ <?php echo $empresa->nro_years ?></h4>
                     <p class="font-open mb-3">Años de experiencia en diseño web, desarrollo y soluciones multiplataforma.</p>
                  </div>
               </article>
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-3xl md:text-5xl my-3">+ <?php echo $empresa->nro_clientes ?></h4>
                     <p class="font-open mb-3">Clientes satisfechos con nuestro trabajo.</p>
                  </div>
               </article>
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-3xl md:text-5xl my-3">100%</h4>
                     <p class="font-open mb-3">Reseñas positivas enviadas por nuestros clientes habituales y nuevos.</p>
                  </div>
               </article>
            </div>
         </div>

         <div class="basis-0 block flex-grow flex-shrink p-3">
            <h2 class="text-4xl xl:text-5xl text-white font-bold mb-5 after:line after:mr-auto">¿Por qué elegir nuestra empresa para tus proyectos?</h2>
            <p class="font-open text-white mb-5">Porque contamos con un equipo de personas profesionales y capacitadas, a las cuales les apasiona lo que hacen y están dispuestos a dar todo de sí, para llevar adelante cualquier proyecto.</p>
            <div class="flex items-center justify-start">
               <a href="/cotizacion" class="btn group-hover:btn-primary font-open uppercase">
                  Cotiza aquí
               </a>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Nuestro Proceso de Trabajo</h2>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-1 md:grid-rows-5 ">
         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 ">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125" src="build/img/virtual-interviews.svg" alt="Reunión con el cliente">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">01</p>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Reunión con el cliente</h3>
               <p class="font-open">La primera reunión es muy importante para familiarizarse y discutir las ideas principales del proyecto.</p>
            </div>

         </article>

         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 md:order-last">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125" src="build/img/visual-collaboration.svg" alt="Plan de trabajo">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">02</p>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Consideramos y analizamos el plan de trabajo</h3>
               <p class="font-open">Cuando entendemos las ideas principales, procedemos a discutir el plan de trabajo y analizarlo.</p>

         </article>

         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125" src="build/img/code-collaboration.svg" alt="Trabajo duro en el proyecto">

               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">03</p>

            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Trabajo duro en el proyecto</h3>
               <p class="font-open">Nuestro equipo de profesionales comienza a trabajar en su proyecto y encarna todos los detalles del concepto inicial.</p>

            </div>
         </article>

         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 order-last ">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125" src="build/img/remote-ideation.svg" alt="Una vez más analizamos y comprobamos todo">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">04</p>

            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Una vez más analizamos y comprobamos todo</h3>
               <p class="font-open">Nos reunimos, analizamos y comprobamos el trabajo realizado en el proyecto y realizamos los cambios necesarios.</p>
            </div>
         </article>

         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125" src="build/img/achieving-product-goals.svg" alt="Terminamos el proyecto y se lo enviamos al cliente">
               </figure>
            </div>

            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">05</p>
            </div>

            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Terminamos el proyecto y se lo enviamos al cliente</h3>
               <p class="font-open">El proyecto está terminado y se lo entregamos a nuestro cliente. También solicitamos ‘feedback’ de los clientes.</p>

            </div>

         </article>
      </div>

   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14 bg-gray-50">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center justify-center gap-x-4 lg:gap-x-6">
         <div class="basis-0 block flex-grow flex-shrink p-2">
            <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mr-auto">Proyectos en los que hemos trabajado</h2>
         </div>
         <div class="basis-0 block flex-grow flex-shrink p-2 text-right">
            <a href="/portafolio" class="btn btn-primary uppercase">
               Ver todos
            </a>
         </div>
      </div>

      <div class="slider swiper my-5">
         <div class="swiper-wrapper">
            <?php foreach ($proyectos as $proyecto) { ?>
               <?php include __DIR__ . '../../templates/proyecto.php'; ?>
            <?php } ?>
         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
      </div>
   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center gap-6 my-6 xl:gap-x-4">
         <div class="basis-0 block flex-grow flex-shrink p-3 md:max-w-xl md:mx-auto space-y-6 mb-6">
            <div class="flex items-center  gap-x-5 gap-y-3">
               <figure>
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-azul" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor"></path>
                  </svg>
               </figure>
               <div class="">
                  <h5 class="font-semibold text-2xl">Dirección:</h5>
                  <p class="font-open"><?php echo $empresa->direccion ?></p>
                  <p class="font-open"><?php echo $empresa->ciudad ?>.</p>
               </div>
            </div>
            <div class="flex items-center  gap-x-5 gap-y-3">
               <figure>
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-azul" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" stroke-width="0" fill="currentColor"></path>
                     <path d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" stroke-width="0" fill="currentColor"></path>
                  </svg>
               </figure>
               <div class="">
                  <h5 class="font-semibold text-2xl">Correo:</h5>
                  <p class="font-open"><?php echo $empresa->email ?></p>
               </div>
            </div>
            <div class="flex items-center gap-x-5 gap-y-3">
               <figure>
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-azul" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M9 3a1 1 0 0 1 .877 .519l.051 .11l2 5a1 1 0 0 1 -.313 1.16l-.1 .068l-1.674 1.004l.063 .103a10 10 0 0 0 3.132 3.132l.102 .062l1.005 -1.672a1 1 0 0 1 1.113 -.453l.115 .039l5 2a1 1 0 0 1 .622 .807l.007 .121v4c0 1.657 -1.343 3 -3.06 2.998c-8.579 -.521 -15.418 -7.36 -15.94 -15.998a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" stroke-width="0" fill="currentColor"></path>
                  </svg>
               </figure>
               <div class="">
                  <h5 class="font-semibold text-2xl">Teléfono:</h5>
                  <p class="font-open">+51 <?php echo $empresa->telefono ?></p>
               </div>
            </div>
         </div>
         <div class="basis-0 block flex-grow flex-shrink p-3 md:max-w-xl md:mx-auto md:p-6 shadow-lg">
            <form id="formulario" class="p-3" method="post">
               <div class="mb-8">
                  <h3 class="text-3xl lg:text-4xl mb-6  text-center lg:text-left ">Envíanos un mensaje</h3>
               </div>
               <div class="grid gap-4 mb-6 md:grid-cols-2">
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

<section class="py-12 px-6 lg:py-24 lg:px-14">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Ellos confían en nosotros</h2>
      </div>

      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-5 my-6 xl:gap-x-4">
         <div class="relative flex flex-col items-center justify-center p-2 transition duration-300 ">
            <figure class="flex items-center justify-center">
               <img class="object-cover transition duration-200 grayscale hover:grayscale-0 w-36 h-36" src="build/img/aldasa-inmobiliaria.webp">
            </figure>
         </div>
         <div class="relative flex flex-col items-center justify-center p-2 transition duration-300 ">
            <figure class="flex items-center justify-center">
               <img class="object-cover transition duration-200 grayscale hover:grayscale-0 w-64 " src="build/img/ak-inversiones-servicios.webp">
            </figure>
         </div>
         <div class="relative flex flex-col items-center justify-center p-2 transition duration-300 ">
            <figure class="flex items-center justify-center">
               <img class="object-cover transition duration-200 grayscale hover:grayscale-0 w-72 " src="build/img/pacha-mama-market.webp">
            </figure>
         </div>
         <div class="relative flex flex-col items-center justify-center p-2 transition duration-300 ">
            <figure class="flex items-center justify-center">
               <img class="object-cover transition duration-200 grayscale hover:grayscale-0 w-80" src="build/img/kallpawasi.webp">
            </figure>
         </div>
         <div class="relative flex flex-col items-center justify-center p-2 transition duration-300 ">
            <figure class="flex items-center justify-center">
               <img class="object-cover transition duration-200 grayscale hover:grayscale-0 w-72" src="build/img/granoperu.webp">
            </figure>
         </div>
      </div>
   </div>
</section>

<section class="py-8 px-6 lg:py-12 bg-blue-50">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl lg:text-5xl  mb-5">Suscríbase a nuestro Newsletter</h2>
      </div>
      <div class="md:flex items-center justify-center ">
         <div class="basis-0 block flex-grow flex-shrink p-2 text-center md:flex-none md:w-2/3 xl:w-1/2">
            <form method="post" id="newsletter">
               <div class="relative w-full mb-3">
                  <input type="email" id="email" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" placeholder="Tu correo" name="email" required>
                  <button type="submit" class="absolute top-0 right-0 h-full btn btn-primary rounded-l-none px-3 uppercase submit">
                     <svg aria-hidden="true" role="status" class="mr-3 w-5 h-5 text-white animate-spin hidden" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                     </svg>
                     <span>Suscribirse</span>
                  </button>
               </div>
            </form>
         </div>

      </div>
   </div>
</section>