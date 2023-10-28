<section class="bg-gray-900">
   <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-3xl font-semibold text-white">
         <img class="w-8 h-8 mr-2" src="/build/img/logo-icon.webp" alt="logo">
         Start Tec
      </a>

      <div class="space-y-6">
         <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8 text-center">
               <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl lg:text-3xl text-white">
                  <?php echo $titulo ?>
               </h1>

            </div>
         </div>
         <div class="sm:max-w-md w-full">
            <?php
            require_once __DIR__ . '/../templates/alertas.php';
            ?>
            <?php if (isset($alertas['from-green-400 to-green-500'])) { ?>
               <div class="text-sm font-light text-gray-400 text-center">
                  <a href="/auth/login" class="font-medium hover:underline text-azul text-lg"> Inicia sesión</a>
               </div>

            <?php } ?>
         </div>

      </div>

   </div>
</section>