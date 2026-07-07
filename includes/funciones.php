<?php

use Cocur\Slugify\Slugify;

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function getSlugify($title): string
{
    $slugify = new Slugify();
    return $slugify->slugify($title);
}

function pagina_actual($path): bool
{
    $uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
    return str_contains($uri, $path) ? true : false;
}

function is_auth(): bool
{
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function is_admin(): bool
{
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}
