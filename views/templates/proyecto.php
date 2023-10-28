<a href="proyecto/<?php echo getSlugify($proyecto->nombre); ?>" class="swiper-slide shadow-xl group" data-categoria="<?php echo $proyecto->categoria_id; ?>">
   <figure class="flex items-center justify-center">
      <picture>
         <source srcset="img/proyectos/imagen_previa/<?php echo $proyecto->imagen_previa; ?>.webp" type="image/webp">
         <source srcset="img/proyectos/imagen_previa/<?php echo $proyecto->imagen_previa; ?>.png" type="image/png">
         <img class="object-cover transition duration-200" src="img/proyectos/imagen_previa/<?php echo $proyecto->imagen_previa; ?>.png" alt="<?php echo $proyecto->nombre ?>">
      </picture>
      <div class="flex items-center justify-center w-full transition-[height,_opacity] inset-0 absolute opacity-0 h-0 cursor-pointer border-none bg-azul group-hover:h-full group-hover:opacity-90 duration-300">
         <div class="text-center">
            <h5 class="text-white text-xl "><?php echo $proyecto->nombre ?></h5>
         </div>
      </div>

   </figure>
</a>