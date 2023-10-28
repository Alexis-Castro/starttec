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

<section class="py-12 px-6 lg:py-24 lg:px-14 bg-gray-50" id="proyectos">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl xl:text-5xl font-bold mb-5 after:line after:mx-auto">Echa un vistazo a nuestros últimos proyectos</h2>
      </div>

      <div class="flex items-center justify-center flex-wrap gap-x-3 p-2 my-2" id="categorias">
         <button class="btn btn-primary text-lg" data-categoria="todos">Todos</button>

         <?php foreach ($categorias as $categoria) { ?>
            <button class="btn border-azul text-azul bg-transparent hover:bg-azul hover:text-white text-lg btn-cat" data-categoria="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></button>
         <?php } ?>
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

<section class="py-8 px-6 lg:py-12 bg-blue-50">
   <div class="lg:max-w-6xl xl:max-w-7xl mx-auto w-full relative">
      <div class="basis-0 block flex-grow flex-shrink p-2 text-center">
         <h2 class="text-4xl lg:text-5xl  mb-5">Suscríbase a nuestro Newsletter</h2>
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