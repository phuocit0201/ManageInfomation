<?php

use Libraries\Facades\Route;

function redirect($url)
{
    header("location:" . base . $url);
    exit();
}

function route($routeName)
{
    if (empty($routeName)) return null;
    $routes = array_merge(Route::routesGet(), Route::routesPost());
    foreach ($routes as $route) {
        if ($route->name === $routeName) {
            return base . $route->path;
        }
    }
}
