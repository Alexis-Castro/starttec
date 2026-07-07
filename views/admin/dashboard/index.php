<h1 class="text-3xl font-bold mb-8"><?php echo $titulo ?></h1>

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
   <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-lg">
      <div class="p-3 mr-4 bg-azul rounded-full">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
         </svg>
      </div>
      <div>
         <p class="text-3xl font-bold text-white"><?php echo $total_proyectos ?></p>
         <p class="text-gray-400">Proyectos</p>
      </div>
   </div>

   <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-lg">
      <div class="p-3 mr-4 bg-celeste rounded-full">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
         </svg>
      </div>
      <div>
         <p class="text-3xl font-bold text-white"><?php echo $total_servicios ?></p>
         <p class="text-gray-400">Servicios</p>
      </div>
   </div>

   <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-lg">
      <div class="p-3 mr-4 bg-green-500 rounded-full">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
         </svg>
      </div>
      <div>
         <p class="text-3xl font-bold text-white"><?php echo $total_personal ?></p>
         <p class="text-gray-400">Personal</p>
      </div>
   </div>

   <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-lg">
      <div class="p-3 mr-4 bg-yellow-500 rounded-full">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
         </svg>
      </div>
      <div>
         <p class="text-3xl font-bold text-white"><?php echo $total_contactos ?></p>
         <p class="text-gray-400">Contactos</p>
      </div>
   </div>

   <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-lg">
      <div class="p-3 mr-4 bg-purple-500 rounded-full">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
         </svg>
      </div>
      <div>
         <p class="text-3xl font-bold text-white"><?php echo $total_cotizaciones ?></p>
         <p class="text-gray-400">Cotizaciones</p>
      </div>
   </div>

   <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-lg">
      <div class="p-3 mr-4 bg-red-500 rounded-full">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
         </svg>
      </div>
      <div>
         <p class="text-3xl font-bold text-white"><?php echo $total_usuarios ?></p>
         <p class="text-gray-400">Usuarios</p>
      </div>
   </div>
</div>
