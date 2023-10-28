<!-- <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
   Open regular modal
</button> -->

<div class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full justify-center items-center p-4 overflow-x-hidden overflow-y-auto outline-0 md:inset-0 max-h-full transition group ease-linear modal" id="modal-cargo">
   <div class="opacity-60 fixed inset-0 bg-black transition modal-background"></div>

   <div class="relative w-full max-w-lg max-h-full transition duration-300 ease-out container-form-cargos">
      <!--Modal content-->
      <div class="relative rounded-lg shadow bg-gray-800">
         <!-- Modal header -->
         <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-700">
            <h3 class="text-2xl font-medium text-white">
               Editar Cargo
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white modal-close" data-modal-hide="medium-modal">
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
               </svg>
               <span class="sr-only">Cerrar modal</span>
            </button>
         </div>
         <!-- Modal body -->
         <form class="" id="" method="POST">
            <div class="w-full mx-auto alertas "></div>
            <div class="grid gap-4 sm:grid-cols-2">
               <div class="p-6 col-span-2">
                  <label for="cargo" class="block mb-2 text-gray-100 false">Cargo</label>
                  <input type="text" id="cargo" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar cargo" name="cargo">
               </div>

            </div>
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-700">
               <button data-modal-hide="medium-modal" type="button" class="btn btn-primary">Actualizar Cargo</button>
               <button data-modal-hide="medium-modal" type="button" class="btn bg-gray-500 text-gray-50 hover:bg-gray-600 modal-close">Cancelar</button>
            </div>
         </form>
      </div>
   </div>
</div>