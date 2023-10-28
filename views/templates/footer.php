<footer id="footer" class="py-12 px-6 lg:px-14 pb-5 bg-slate-950">
   <div class="lg:max-w-5xl xl:max-w-7xl relative mx-auto">
      <div class="md:grid md:grid-cols-2 xl:grid-cols-4 gap-4 justify-center flex-wrap space-y-5">
         <div class="p-2">
            <a href="/" class="navbar-item pl-0 mb-4 inline-flex">
               <img class="" src='/build/img/logo-start-tec2.png' alt="Start Tec Perú" width="150" height="43" />
            </a>

            <p class="text-gray-400">
               Start Tec provee soluciones en tecnologías de información, principalmente en el desarrollo de paginas web y sistemas, contamos con la experiencia necesaria para llevar a cabo proyectos informáticos de acuerdo a su necesidad.
            </p>
         </div>

         <div class="p-2">
            <h4 class="text-white text-left text-lg font-bold mb-3">
               Servicios
            </h4>

            <div>
               <ul class="text-gray-400">
                  <?php foreach ($servicios as $servicio) { ?>
                     <li class="mb-1">
                        <a href="/servicio/<?php echo getSlugify($servicio->titulo); ?>" target="_blank" class="text-gray-400 hover:underline">
                           <?php echo $servicio->titulo; ?>
                        </a>
                     </li>
                  <?php } ?>

               </ul>
            </div>
         </div>

         <div class="p-2">
            <h4 class="text-white text-left text-lg font-bold mb-3">
               Navegación
            </h4>

            <div>
               <ul class="text-gray-400">

                  <li class="mb-1">
                     <a href="/nosotros" class="text-gray-400 hover:underline">Nosotros</a>
                  </li>

                  <li class="mb-1">
                     <a href="/portafolio" class="text-gray-400 hover:underline">Proyectos</a>
                  </li>

                  <li class="mb-1">
                     <a href="/contacto" class="text-gray-400 hover:underline">Contacto</a>
                  </li>
               </ul>
            </div>
         </div>

         <div class="p-2">
            <h4 class="text-white text-left text-lg font-bold mb-3">
               Contáctanos
            </h4>

            <div class="">
               <ul class="text-gray-400">
                  <li class="flex items-center mb-2">
                     <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="mr-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                     </svg>

                     <p class="w-full">
                        Prolongación Pacasmayo Nro 420. Chiclayo, Lambayeque
                     </p>
                  </li>

                  <li class="flex items-center mb-2">
                     <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="mr-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                     </svg>

                     <a class="text-gray-400 w-full" href="mailto:administracion@starttecperu.com">administracion@starttecperu.com</a>
                  </li>
                  <li class="flex items-center mb-2">
                     <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="mr-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                     </svg>

                     <a class="text-gray-400 w-full" href="mailto:startteccorporation@gmail.com">startteccorporation@gmail.com</a>
                  </li>

                  <li class="flex items-center mb-2">
                     <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="mr-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                     </svg>

                     <a class="text-gray-400 w-full" href="tel:970555683">+51 996 377 277</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>

      <hr class="my-6 border-cyan-ak" />

      <div class="md:flex justify-between items-center">
         <p class="text-gray-200 text-sm text-center mb-6 md:mb-0">
            <span class="">© Start Tec <?php echo date('Y') ?> - Todos los derechos reservados
         </p>

         <div class="redes-sociales">
            <div class="flex items-center justify-center">
               <ul class="flex">
                  <li class="px-1">
                     <a class="text-white inline-block p-2 rounded-md hover:bg-celeste transition-colors" href="https://www.facebook.com/ayllukaypi" rel="noopener noreferrer" target="_blank" title="Enlace a Facebook">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" class="w-7 h-7" height="1.5rem" width="1.5rem" xmlns="http://www.w3.org/2000/svg">
                           <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                        </svg>
                     </a>
                  </li>
                  <li class="px-1">
                     <a class="text-white inline-block p-2 rounded-md hover:bg-celeste transition-colors" href="https://www.instagram.com/ayllukaypi/" rel="noopener noreferrer" target="_blank" title="Enlace a Instagram">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="w-7 h-7" height="1.5rem" width="1.5rem" xmlns="http://www.w3.org/2000/svg">
                           <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                        </svg>
                     </a>
                  </li>
                  <li class="px-1">
                     <a class="text-white inline-block p-2 rounded-md hover:bg-celeste transition-colors" href="https://www.youtube.com/channel/UCZkhb3dfohLS43A8ktccMkQ" rel="noopener noreferrer" target="_blank" title="Enlace a Youtube">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="w-7 h-7" height="1.5rem" width="1.5rem" xmlns="http://www.w3.org/2000/svg">
                           <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                        </svg>
                     </a>
                  </li>
                  <li class="px-1">
                     <a class="text-white inline-block p-2 rounded-md hover:bg-celeste transition-colors" href="https://www.tiktok.com/@ayllukaypi.pe" rel="noopener noreferrer" target="_blank">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="w-7 h-7" height="1.5rem" width="1.5rem" xmlns="http://www.w3.org/2000/svg">
                           <path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"></path>
                        </svg>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</footer>