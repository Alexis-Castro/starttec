<div class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full justify-center items-center p-4 overflow-x-hidden overflow-y-auto outline-0 md:inset-0 max-h-full transition group ease-linear modal" id="modal-categoria-crear">
   <div class="opacity-60 fixed inset-0 bg-black transition modal-background"></div>

   <div class="relative w-full max-w-lg max-h-full container-form-categorias transition duration-[400ms] ease-out -translate-y-12 modal-dialog ">
      <!--Modal content-->
      <div class="relative rounded-lg shadow bg-gray-800">
         <!-- Modal header -->
         <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-700">
            <h3 class="text-2xl font-medium text-white">
               Crear Categoría
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white modal-close" data-modal-hide="medium-modal">
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
               </svg>
               <span class="sr-only">Cerrar modal</span>
            </button>
         </div>
         <!-- Modal body -->
         <form class="" id="registro" method="POST">
            <div class="w-full mx-auto alertas px-6 pt-6"></div>
            <div class="grid gap-4 sm:grid-cols-2">
               <div class="px-6 col-span-2">
                  <label for="categoria_crear" class="block mb-2 text-gray-100 false">Categoría</label>
                  <input type="text" id="categoria_crear" class="rounded-lg border-transparent flex-1 appearance-none border w-full py-2.5 px-3 bg-gray-700 transition text-gray-300 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-azul-claro focus:border-transparent" placeholder="Ingresar categoria" name="nombre">
               </div>

            </div>
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-700">
               <button data-modal-hide="medium-modal" type="submit" class="btn btn-primary submit">
                  <svg aria-hidden="true" role="status" class="mr-3 w-5 h-5 text-white animate-spin hidden" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                     <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                  </svg>
                  Registrar Categoría
               </button>
               <button data-modal-hide="medium-modal" type="button" class="btn bg-gray-500 text-gray-50 hover:bg-gray-600 modal-close">Cancelar</button>
            </div>
         </form>
      </div>
   </div>
</div>