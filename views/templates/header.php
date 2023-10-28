<header class="fixed top-0 left-0 w-full z-50 transition-[padding,_background] duration-300 ease-out py-3 lg:py-5 <?php echo pagina_actual('nosotros') ? '' : 'no' ?>" id="header">
   <nav class="group navbar">
      <div class="lg:max-w-5xl xl:max-w-7xl mx-auto w-full maxlg:group-[.navbar]:block relative grow group-[.navbar]:flex group-[.navbar]:items-stretch ">
         <div class="flex items-stretch shrink-0 min-h-[4rem]">
            <a class="flex items-center relative grow-0 shrink-0 px-3" href="/">
               <picture>
                  <source srcset='/build/img/logo-start-tec2.avif' type="image/avif" />
                  <source srcset='/build/img/logo-start-tec2.webp' type="image/webp" />
                  <img class="max-h-12" width="135" height="47" src='/build/img/logo-start-tec2.png' alt="Ayllu Kaypi - Aquí hogar, Aquí familia" />
               </picture>
            </a>
            <div class="flex items-center gap-3 ml-auto lg:hidden px-3" id="navbar-mobile-content">
               <button data-target="navbar-mobile" class="inline-flex items-center p-2 text-sm text-gray-300 rounded-md lg:hidden hover:bg-azul focus:outline-none focus:ring-2 focus:ring-[#4d5b87] navbar-burger" aria-controls="navbar-default" aria-expanded="false" aria-label="menu">
                  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                  </svg>
               </button>
            </div>
         </div>
         <nav class="navbar-menu hidden top-0 lg:grow lg:shrink-0 lg:flex lg:items-stretch maxlg:shadow-lg maxlg:py-2 maxlg:px-0 maxlg:overflow-auto maxlg:items-center maxlg:grow maxlg:shrink-0 transition rounded-b-sm" id="navbar-mobile" aria-labelledby="header-navigation">
            <h2 class="sr-only" id="header-navigation">Menú de Navegación</h2>

            <ul class="font-bold group lg:flex lg:items-center justify-end ml-auto">

               <li>
                  <a class="transition <?php echo pagina_actual('/nosotros') ? 'text-celeste' : 'text-white hover:text-white/80' ?>  py-2 px-3 uppercase block shrink-0 grow-0 relative md:flex md:items-center" href="/nosotros">
                     Nosotros
                  </a>
               </li>

               <li>
                  <a class="transition <?php echo pagina_actual('/servicios') ? 'text-celeste' : 'text-white hover:text-white/80' ?>  py-2 px-3 uppercase block shrink-0 grow-0 relative md:flex md:items-center" href="/servicios">
                     Servicios
                  </a>
               </li>

               <li>
                  <a class="transition <?php echo pagina_actual('/contacto') ? 'text-celeste' : 'text-white hover:text-white/80' ?>  py-2 px-3 uppercase block shrink-0 grow-0 relative md:flex md:items-center" href="/contacto">
                     Contacto
                  </a>
               </li>

               <li>
                  <a class="transition <?php echo pagina_actual('/portafolio') ? 'text-celeste' : 'text-white hover:text-white/80' ?>  py-2 px-3 uppercase block shrink-0 grow-0 relative md:flex md:items-center" href="/portafolio">
                     Portafolio
                  </a>
               </li>

               <li>
                  <a class="transition text-white hover:text-white/80 py-2 px-3 uppercase block shrink-0 grow-0 relative md:flex md:items-center" href="https://starttecstore.com/" target="_blank">
                     Tienda Virtual
                  </a>
               </li>

               <li>
                  <a class="btn btn-primary uppercase" href="cotizacion">
                     Solicitar Cotización
                  </a>
               </li>
            </ul>
         </nav>
      </div>
   </nav>
</header>