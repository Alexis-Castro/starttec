<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title>Start Tec - <?php echo $titulo ?></title>
    <!-- <link rel="preconnect" href="https://i3.ytimg.com"> -->
    <!-- <link rel="preconnect" href="https://res.cloudinary.com"> -->
    <link rel="preload" as="image" href="/build/img/logo-start-tec2.png">
    <link rel="preload" as="script" href="/build/js/app.min.js">
    <script src="/build/js/app.min.js" defer></script>
    <meta name="description" content="Start Tec provee soluciones en tecnologías de información, principalmente en el desarrollo de paginas web y sistemas, contamos con la experiencia necesaria para llevar a cabo proyectos informáticos de acuerdo a su necesidad.">
    <link rel="canonical" href="https://starttecperu.com/">
    <link rel="icon" href="/build/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/build/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/build/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/build/favicon/favicon-16x16.png">
    <meta name="apple-mobile-web-app-title" content="starttecperu.com">
    <meta name="application-name" content="starttecperu.com">
    <meta name="theme-color" content="#0099ff">
    <link rel="alternate" type="application/rss+xml" href="https://starttecperu.com/index.xml" title="Start Tec - <?php echo $titulo ?>">
    <meta property="og:url" content="https://starttecperu.com/">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@starttec">
    <meta name="twitter:domain" content="starttecperu.com">
    <meta name="twitter:image" content="/build/favicon/apple-touch-icon.png">
    <meta name="twitter:site" content="@starttec">
    <!-- <link rel="manifest" href="/manifest.json"> -->
    <meta property="og:locale" content="es_ES">
    <meta property="og:title" content="Start Tec | Desarrollo de Software a medida">
    <meta property="og:image" content="/build/favicon/apple-touch-icon.png">
    <meta property="og:description" content="Start Tec provee soluciones en tecnologías de información, principalmente en el desarrollo de paginas web y sistemas, contamos con la experiencia necesaria para llevar a cabo proyectos informáticos de acuerdo a su necesidad.">
    <meta property="og:site_name" content="starttecperu.com">
    <link rel="stylesheet" href="/build/css/main.css">

    <style>
        .typed-cursor {
            color: #fff;
            font-size: 2.20rem;
        }

        @media (min-width: 1024px) {
            .typed-cursor {
                font-size: 3.50rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>

<body>
    <?php
    include_once __DIR__ . '/templates/header.php';
    echo $contenido;
    include_once __DIR__ . '/templates/footer.php';
    ?>
    <!-- <script type="module" src="/build/js/app.min.js" defer></script> -->
</body>

</html>