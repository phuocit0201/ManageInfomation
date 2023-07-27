<?php

use Libraries\Facades\Route;

function redirect($url)
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $isRouteName = stristr($url, $protocol) !== false ? true : false;
    if ($isRouteName) {
        header("location:" . $url);
    } else {
        header("location:" . base . $url);
    }
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

function getOldValue($key)
{
    if (isset($_SESSION['old'][$key])) {
        $value = $_SESSION['old'][$key];
        unset($_SESSION['old'][$key]);
        return $value;
    }
    return '';
}

function setOldValue($data)
{
    if (isset($_SESSION['old'])) {
        unset($_SESSION['old']);
    }
    $_SESSION['old'] = $data;
}
