<?php 
namespace Libraries\Facades;
use Libraries\Facades\Routing;
class Route
{
    private static $get = array();
    private static $post = array();

    public static $routing;
    public static function get($path, $controller, $action)
    {
        self::$routing = new Routing();
        self::$routing->path = $path;
        self::$routing->controller = $controller;
        self::$routing->action = $action;
        self::$get[] = self::$routing;
        return new self;
    }

    public function middleware($middleware)
    {
        self::$routing->middleware = $middleware;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach(self::$post as $route) {
                if (self::$routing->path == $route->path) {
                    $route->middleware = $middleware;
                    return $this;
                }
            }
        } else {
            foreach(self::$get as $route) {
                if (self::$routing->path == $route->path) {
                    $route->middleware = $middleware;
                    return $this;
                }
            }
        }

        return $this;
    }

    public function name($name)
    {
        self::$routing->name = $name;
        return;
    }

    public static function post($path, $controller, $action)
    {
        self::$routing = new Routing();
        self::$routing->path = $path;
        self::$routing->controller = $controller;
        self::$routing->action = $action;
        self::$post[] = self::$routing;
        return new self;
    }

    public static function routesGet()
    {
        return self::$get;
    }

    public static function routesPost()
    {
        return self::$post;
    }
}
?>