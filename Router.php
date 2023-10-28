<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    // public function get($url, $fn)
    // {
    //     $this->getRoutes[$url] = $fn;
    // }

    public function get($url, $fn)
    {
        $pattern = preg_replace('/\//', '\\/', $url); // Escapa los slashes
        $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $pattern); // Convierte las rutas con parámetros
        $pattern = '/^' . $pattern . '$/i'; // Agrega los delimitadores de inicio y fin

        $this->getRoutes[$pattern] = $fn;
    }

    public function post($url, $fn)
    {
        $pattern = preg_replace('/\//', '\\/', $url); // Escapa los slashes
        $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $pattern); // Convierte las rutas con parámetros
        $pattern = '/^' . $pattern . '$/i'; // Agrega los delimitadores de inicio y fin

        $this->postRoutes[$pattern] = $fn;
    }

    public function comprobarRutas()
    {

        // $url_actual = $_SERVER['PATH_URI'] ?? '/';
        $url_actual = $_SERVER['PATH_INFO'] ?? '/';

        // debuguear($url_actual);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            // $fn = $this->getRoutes[$url_actual] ?? null;
            $fn = $this->matchRoute($this->getRoutes, $url_actual);
        } else {
            // $fn = $this->postRoutes[$url_actual] ?? null;
            $fn = $this->matchRoute($this->postRoutes, $url_actual);
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    private function matchRoute($routes, $url)
    {
        foreach ($routes as $pattern => $fn) {
            if (preg_match($pattern, $url, $matches)) {
                // Extraer los parámetros de la ruta
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Llamar a la función con los parámetros de la ruta
                return function () use ($fn, $params) {
                    // Asegúrate de que $router es el primer argumento
                    $args = array_merge([$this], $params);
                    call_user_func_array($fn, $args);
                };
            }
        }

        return null;
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        // Utilizar el Layout de acuerdo a la URL
        $url_actual = $_SERVER['PATH_INFO'] ?? '/';

        if (str_contains($url_actual, '/admin')) {
            include_once __DIR__ . '/views/admin-layout.php';
        } else {
            include_once __DIR__ . '/views/layout.php';
        }
    }
}
