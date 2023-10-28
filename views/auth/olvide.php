<section class="bg-gray-900">
   <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-3xl font-semibold text-white">
         <img class="w-8 h-8 mr-2" src="/build/img/logo-icon.webp" alt="logo">
         Start Tec
      </a>
      <div class="sm:max-w-md w-full">
         <?php
         require_once __DIR__ . '/../templates/alertas.php';
         ?>

      </div>
      <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-lg xl:p-0 bg-gray-800 border-gray-700">
         <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl text-white">
               <?php echo $titulo ?>
            </h1>
            <form method="POST" class="space-y-4 md:space-y-6" action="/auth/olvide">

               <fieldset>
                  <label for="email" class="block mb-2 text-lg font-medium text-white">Tu email</label>
                  <input type="email" name="email" id="email" class="appearance-none bg-slate-800 border border-gray-500 flex-1 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-azul-claro placeholder-gray-400 px-2.5 py-2 rounded-lg shadow-sm text-gray-200 transition w-full" placeholder="correo@gmail.com">
               </fieldset>


               <button type="submit" class="w-full text-white focus:ring-2 focus:outline-none font-medium rounded-lg px-5 py-2.5 text-center bg-azul hover:bg-azul ">Enviar Instrucciones</button>

               <div class="flex items-center justify-between">
                  <p class="text-sm font-light text-gray-400">
                     ¿Ya tienes una cuenta? <a href="/auth/login" class="font-medium hover:underline text-azul"> Inicia sesión</a>
                  </p>

               </div>
            </form>
         </div>
      </div>
   </div>
</section>