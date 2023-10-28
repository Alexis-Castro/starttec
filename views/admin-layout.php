<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Start Tec - <?php echo $titulo; ?></title>
   <meta name="view-transition" content="same-origin" />
   <meta name="description" content="Start Tec provee soluciones en tecnologías de información, principalmente en el desarrollo de paginas web y sistemas, contamos con la experiencia necesaria para llevar a cabo proyectos informáticos de acuerdo a su necesidad.">
   <link rel="canonical" href="https://starttecperu.com/">
   <link rel="icon" href="/build/favicon/favicon.ico" type="image/x-icon">
   <link rel="apple-touch-icon" sizes="180x180" href="/build/favicon/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="/build/favicon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="/build/favicon/favicon-16x16.png">
   <!-- <meta name="apple-mobile-web-app-title" content="starttecperu.com"> -->
   <!-- <meta name="application-name" content="starttecperu.com"> -->
   <meta name="theme-color" content="#0099ff">

   <link rel="stylesheet" href="/build/css/main.css">
   <link rel="stylesheet" href="/build/css/dropzone.css">
   <link rel="stylesheet" href="/build/css/quill.snow.min.css">

   <script defer src="https://cdnjs.cloudflare.com/ajax/libs/quill/2.0.0-dev.3/quill.min.js"></script>


   <!-- Include Quill stylesheet -->
   <!-- <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-dev.3/dist/quill.snow.min.css" rel="stylesheet" /> -->
</head>

<body class=" bg-[#1f2937] admin-body">

   <?php
   include_once __DIR__ . '/templates/admin-header.php';
   ?>

   <div class="flex pt-16 overflow-hidden">
      <?php
      include_once __DIR__ . '/templates/admin-sidebar.php';
      ?>

      <div class="fixed inset-0 z-10 hidden bg-[rgba(17,24,39,.9)]" id="sidebarBackdrop"></div>

      <div class="bg-[rgb(17,24,39)] relative h-full w-full overflow-y-auto lg:ml-64" id="main-content">
         <main class="mx-auto p-6 xl:p-10 text-gray-200">
            <?php
            echo $contenido;
            ?>

         </main>

      </div>

   </div>

   <script type="module" src="/build/js/admin.min.js" defer></script>
   <script src="/build/js/lite-youtube.js" defer></script>
   <!-- <script>
      if (document.startViewTransition) {
         // console.log('soporta');
         window.navigation.addEventListener('navigate', (event) => {
            const toUrl = new URL(event.destination.url)
            // console.log(toUrl);
            // es una página externa? si es así, lo ignoramos
            if (location.origin !== toUrl.origin) return

            // si es una navegación en el mismo dominio (origen)
            event.intercept({
               async handler() {
                  // vamos a cargar la página de destino
                  // utilizando un fetch para obtener el HTML
                  const response = await fetch(toUrl.pathname) // /clean-code
                  const text = await response.text()
                  // quedarnos sólo con el contenido del html dentro de la etiqueta body
                  // usamos un regex para extraerlo
                  const [, data] = text.match(/<body[^>]*>([\s\S]*?)<\/body>/i)
                  // console.log(data);

                  // utilizar la api de View Transition API
                  document.startViewTransition(() => {
                     // el scroll hacia arriba del todo
                     document.body.innerHTML = data
                     document.documentElement.scrollTop = 0
                  })
               }
            })
         })
      }
   </script> -->
</body>