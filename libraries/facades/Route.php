<?php 
namespace Libraries\Facades;
class Route
{
    public static $get = array();
    public static $post = array();

    public static function get($path, $controller, $action, $middleware = null)
    {
        self::$get[] = [
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
        ];
    }

    public static function post($path, $controller, $action, $middleware = null)
    {
        self::$post[] = [
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
        ];
    }
}
?>