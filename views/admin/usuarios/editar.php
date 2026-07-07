<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-8">
   <h2 class="text-3xl font-bold text-white">
      <?php echo $titulo ?>
   </h2>

   <div>
      <a class="btn btn-primary gap-1" href="/admin/usuarios">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"></path>
         </svg>
         Volver
      </a>
   </div>
</div>

<form class="js-form" method="POST" action="/admin/usuarios/editar?id=<?php echo $usuario->id ?>">
   <div class="w-full mx-auto alertas"></div>

   <div class="grid gap-6 mb-6 md:grid-cols-2">
      <div>
         <label for="nombre" class="block mb-2 text-gray-100">Nombre</label>
         <input type="text" id="nombre" name="nombre" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Nombre" value="<?php echo $usuario->nombre ?? ''; ?>">
      </div>

      <div>
         <label for="apellido" class="block mb-2 text-gray-100">Apellido</label>
         <input type="text" id="apellido" name="apellido" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Apellido" value="<?php echo $usuario->apellido ?? ''; ?>">
      </div>

      <div>
         <label for="email" class="block mb-2 text-gray-100">Email</label>
         <input type="email" id="email" name="email" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Email" value="<?php echo $usuario->email ?? ''; ?>">
      </div>

      <div>
         <label for="password" class="block mb-2 text-gray-100">Nueva Contraseña</label>
         <input type="password" id="password" name="password" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Dejar en blanco para mantener">
      </div>

      <div>
         <label for="password2" class="block mb-2 text-gray-100">Repetir Contraseña</label>
         <input type="password" id="password2" name="password2" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Repetir Contraseña">
      </div>

      <div>
         <label class="block mb-2 text-gray-100">Admin</label>
         <label class="inline-flex items-center cursor-pointer">
            <input type="checkbox" name="admin" value="1" class="sr-only peer" <?php echo ($usuario->admin ?? 0) ? 'checked' : '' ?>>
            <div class="relative w-11 h-6 bg-gray-600 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-azul"></div>
            <span class="ms-3 text-gray-300">Usuario administrador</span>
         </label>
      </div>
   </div>

   <div class="flex justify-end">
      <button type="submit" class="btn btn-primary gap-1">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 17h4l10 -10a1.5 1.5 0 0 0 -3 -3l-10 10v4"></path>
         </svg>
         Guardar Cambios
      </button>
   </div>
</form>
