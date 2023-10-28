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

<section class="py-12 px-6 lg:py-24 lg:px-14">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center justify-center">
         <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
            <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Te Ofrecemos Nuestros Servicios</h2>
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

<section class="py-12 px-6 lg:py-24 lg:px-14 bg-center bg-no-repeat bg-cover max-w-none bg-features">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="flex items-center justify-center flex-wrap py-10">
         <div class="basis-0 block flex-grow flex-shrink p-2 sm:flex-none sm:w-1/2 lg:w-3/12 ">
            <div class="flex items-center gap-x-4 gap-y-3">
               <figure>
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-celeste" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                     <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                     <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                     <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                  </svg>
               </figure>
               <div class="text-white">
                  <h5 class="font-bold text-4xl md:text-5xl"><?php echo $empresa->nro_clientes ?> +</h5>
                  <p class="font-open text-lg">Clientes felices</p>
               </div>
            </div>
         </div>
         <div class="basis-0 block flex-grow flex-shrink p-2 sm:flex-none sm:w-1/2 lg:w-3/12">
            <div class="flex items-center gap-x-4 gap-y-3">
               <figure>
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-celeste" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                     <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                     <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                     <path d="M16 19h6"></path>
                     <path d="M19 16v6"></path>
                  </svg>
               </figure>
               <div class="text-white">
                  <h5 class="font-bold text-4xl md:text-5xl">50 +</h5>
                  <p class="font-open text-lg">Cuentas afiliadas</p>
               </div>
            </div>
         </div>
         <div class="basis-0 block flex-grow flex-shrink p-2 sm:flex-none sm:w-1/2 lg:w-3/12">
            <div class="flex items-center gap-x-4 gap-y-3">
               <figure>
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-celeste" width="60" height="60" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                     <path d="M14 19l2 2l4 -4"></path>
                     <path d="M9 8h4"></path>
                     <path d="M9 12h2"></path>
                  </svg>
               </figure>
               <div class="text-white">
                  <h5 class="font-bold text-4xl md:text-5xl"><?php echo $empresa->nro_proyectos ?> +</h5>
                  <p class="font-open text-lg">Proyectos realizados</p>
               </div>
            </div>
         </div>
         <div class="basis-0 block flex-grow flex-shrink p-2 sm:flex-none sm:w-1/2 lg:w-3/12">
            <div class="flex items-center gap-x-4 gap-y-3">
               <figure>
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-celeste" width="60" height="60" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M13.5 21h-7.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5"></path>
                     <path d="M16 3v4"></path>
                     <path d="M8 3v4"></path>
                     <path d="M4 11h16"></path>
                     <path d="M19 16l-2 3h4l-2 3"></path>
                  </svg>
               </figure>
               <div class="text-white">
                  <h5 class="font-bold text-4xl md:text-5xl"><?php echo $empresa->nro_years ?> +</h5>
                  <p class="font-open text-lg">Años de experiencia</p>
               </div>
            </div>
         </div>
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
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">¿Cómo trabajamos?</h2>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-1 md:grid-rows-5 ">
         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 md:order-last">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125 xl:max-w-[30rem]" src="build/img/estudio-analisis.svg" alt="Estudio y Análisis">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">01</p>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Estudio y análisis</h3>
               <p class="font-open">Estudiamos y analizamos tus objetivos, e investigamos cómo se mueve tu mercado para diseñar la estrategia web a desarrollar.</p>

            </div>
         </article>
         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 md:order-last">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125 xl:max-w-[30rem]" src="build/img/calendar-cronograma.svg" alt="Cronograma de desarrollo">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">02</p>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Cronograma de desarrollo</h3>
               <p class="font-open">Establecemos un plan de trabajo adecuado a la programación de sus actividades de promoción o venta. Este cronograma también le permitirá monitorear el avance del desarrollo de su proyecto.</p>

            </div>
         </article>
         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 md:order-last">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125 xl:max-w-[30rem]" src="build/img/prototyping_process.svg" alt="Elaboración de la propuesta">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">03</p>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Elaboración de la propuesta</h3>
               <p class="font-open">Creamos y diseñamos wireframes y prototipos animados, que brindan la versatilidad para plasmas las preferencias y requerimientos del cliente en el diseño final.</p>

            </div>
         </article>
         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 md:order-last">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125 xl:max-w-[30rem]" src="build/img/maquetacion-desarrollo.svg" alt="Diseño y programación">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">04</p>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Diseño y programación</h3>
               <p class="font-open">Maquetamos el diseño aprobado previamente por nuestro cliente, de manera que sea compatible con los navegadores y cuente con las funciones naturales de un sitio web.</p>

            </div>
         </article>
         <article class="md:flex items-center">
            <div class="basis-0 block flex-grow flex-shrink p-2 md:order-last">
               <figure class="flex items-center justify-center">
                  <img class="object-cover transition duration-200 group-hover:scale-125 xl:max-w-[30rem]" src="build/img/control-calidad.svg" alt="Control de calidad">
               </figure>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2 md:flex-none md:w-auto">
               <p class="flex items-center justify-center bg-azul-claro shadow-2xl shadow-azul-claro w-20 h-20 rounded-full text-4xl text-white">05</p>
            </div>
            <div class="basis-0 block flex-grow flex-shrink p-2">
               <h3 class="font-semibold text-3xl my-3 text-left">Control de calidad</h3>
               <p class="font-open">Nos encargamos de verificar el correcto funcionamiento, visualización y compatibilidad del producto en variedad de navegadores y dispositivos.</p>

            </div>
         </article>
      </div>
   </div>
</section>