<section class="h-screen relative z-10">
   <div class="w-full h-full absolute py-12 px-6 lg:py-24 lg:px-14 ">
      <div class="w-full h-full flex items-center justify-center mx-auto lg:max-w-5xl xl:max-w-7xl">
         <div class="block basis-0 shrink p-2 grow z-10 relative text-center text-gray-50 md:flex-none md:w-2/3">
            <h2 class="font-bold text-4xl lg:text-6xl [text-wrap:balance] tracking-tight mb-6">Somos un equipo con un enfoque creativo para trabajar</h2>
            <p class="font-open text-lg leading-8">Nuestros diseñadores y desarrolladores trabajan en estrecha colaboración, para crear un entorno de trabajo creativo y positivo. Siempre nos preocupamos, tanto por la funcionalidad, como la parte visual o estética de nuestros proyectos.</p>
         </div>
      </div>
   </div>

   <div class="overflow-hidden relative w-full h-full ">
      <div class="bg-[url(/build/img/servicios-fondo.webp)] absolute h-full bg-center bg-no-repeat bg-fixed bg-cover min-w-[calc(100%+50px)] max-w-none before:inset-0 before:absolute before:bg-[rgba(0,0,0,.52)]">
      </div>
   </div>
</section>

<section class="py-12 px-6 lg:py-24 lg:px-14">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center justify-center gap-x-4 lg:gap-x-6 2xl:gap-x-12 space-y-6">
         <div class="basis-0 block flex-grow flex-shrink p-3 md:max-w-xl md:mx-auto space-y-6">
            <div class="flex items-center gap-x-5 gap-y-3 shadow-lg p-9 rounded-md">
               <figure>
                  <img class="object-cover transition duration-200 w-14" src="build/img/icono_lupa.svg">
               </figure>
               <h5 class="font-light text-slate-800 text-2xl">Siempre analizamos el mercado</h5>
            </div>
            <div class="flex items-center  gap-x-5 gap-y-3 shadow-lg p-9 rounded-md">
               <figure>
                  <img class="object-cover transition duration-200 w-14" src="build/img/idea.svg">
               </figure>
               <h5 class="font-light text-slate-800 text-2xl">Tenemos las ideas más brillantes</h5>
            </div>
            <div class="flex items-center gap-x-5 gap-y-3 shadow-lg p-9 rounded-md">
               <figure>
                  <img class="object-cover transition duration-200 w-14" src="build/img/bullseye-arrow.svg">
               </figure>
               <h5 class="font-light text-slate-800 text-2xl">Siempre hacemos proyectos exitosos</h5>
            </div>
         </div>

         <div class="basis-0 block flex-grow flex-shrink p-3 md:max-w-xl md:mx-auto">
            <h2 class="text-4xl xl:text-5xl mb-5">El trabajo en equipo es la clave para un producto exitoso</h2>
            <p class="font-open">Nuestro equipo juega un gran papel en el trabajo creativo y técnico que producimos.</p>
         </div>
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
                     <a href="<?php echo $servicio->slug; ?>" class="btn group-hover:btn-primary duration-300 rounded-full font-open uppercase justify-center gap-x-2 group-hover:gap-x-4 transition-all font-bold">
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

<section class="py-12 px-6 lg:py-24 lg:px-14 bg-center bg-no-repeat bg-cover max-w-none bg-why ">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="lg:flex items-center justify-center gap-x-4 lg:gap-x-6 2xl:gap-x-12">

         <div class="basis-0 block flex-grow flex-shrink p-3 text-center lg:text-left lg:flex-none lg:w-2/5">
            <h2 class="text-4xl xl:text-5xl text-white font-bold mb-5 after:line after:mx-auto lg:after:ml-0">¿Por qué elegir nuestra empresa para tus proyectos?</h2>
            <p class="font-open text-white mb-5">Contamos con la experiencia y el talento profesional para impulsar tu negocio.</p>

         </div>

         <div class="basis-0 block flex-grow flex-shrink p-3">
            <div class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 place-content-center">
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-4xl md:text-5xl my-3">+ <?php echo $empresa->nro_proyectos ?></h4>
                     <p class="font-open mb-3">Proyectos realizados por nuestro equipo de diseñadores y desarrolladores web.</p>
                  </div>
               </article>
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-4xl md:text-5xl my-3">+ <?php echo $empresa->nro_years ?></h4>
                     <p class="font-open mb-3">Años de experiencia en diseño web, desarrollo y soluciones multiplataforma.</p>
                  </div>
               </article>
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-4xl md:text-5xl my-3">+ <?php echo $empresa->nro_clientes ?></h4>
                     <p class="font-open mb-3">Clientes satisfechos con nuestro trabajo.</p>
                  </div>
               </article>
               <article class="relative flex flex-col items-center justify-center max-w-xs sm:w-full mx-auto p-2 transition duration-300 rounded-xl shadow-lg hover:shadow-xl group bg-white/20">
                  <div class="w-full px-6 py-8 2xl:py-6 rounded transition text-white">
                     <h4 class="font-semibold text-4xl md:text-5xl my-3">100%</h4>
                     <p class="font-open mb-3">Reseñas positivas enviadas por nuestros clientes habituales y nuevos.</p>
                  </div>
               </article>
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
      <div class="lg:flex items-center justify-center">
         <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
            <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Conoce a Nuestro Equipo</h2>
         </div>
      </div>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 place-content-center my-6 gap-x-6 gap-y-8 xl:gap-x-4">
         <?php foreach ($personal as $persona) { ?>


            <article class="relative flex flex-col items-center justify-center w-80 sm:w-full xl:w-4/5 2xl:w-9/12 mx-auto transition duration-300 rounded-md bg-white border-b-2 border-azul hover:-translate-y-4 group">
               <div class=" w-full rounded transition text-center">
                  <figure class="flex items-center justify-center overflow-hidden rounded-lg">
                     <picture>
                        <source srcset="img/personal/<?php echo $persona->imagen; ?>.webp" type="image/webp">
                        <img class="object-cover transition duration-200" src="img/personal/<?php echo $persona->imagen; ?>.png" alt="<?php echo $persona->nombre . ' ' . $persona->apellido ?>">
                     </picture>

                  </figure>
                  <h3 class="font-semibold text-2xl my-3 pt-2"><?php echo $persona->nombre . ' ' . $persona->apellido ?></h3>
                  <p class="font-open mb-3 text-sm text-azul pb-2"><?php echo $persona->categoria_id->nombre; ?></p>
               </div>
            </article>

         <?php } ?>
      </div>
   </div>
</section>

<section class="py-8 px-6 lg:py-12 bg-blue-50">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl xl:text-5xl  mb-5">Suscríbase a nuestro Newsletter</h2>
      </div>
      <div class="md:flex items-center justify-center ">
         <div class="basis-0 block flex-grow flex-shrink p-2 text-center md:flex-none md:w-2/3 xl:w-1/2">
            <form method="post">
               <div class="relative w-full mb-3">
                  <input type="email" id="newsletter" class="w-full rounded py-2 px-2.5 outline-none transition-colors focus-visible:shadow-none border border-gray-300 focus:ring-blue-900 focus:border-azul font-open" placeholder="Tu correo" name="newsletter" required>
                  <button type="submit" class="absolute top-0 right-0 h-full btn btn-primary rounded-l-none px-3 uppercase submit" id="">
                     <span>Suscribirse</span>
                  </button>
               </div>
            </form>
         </div>

      </div>
   </div>
</section>