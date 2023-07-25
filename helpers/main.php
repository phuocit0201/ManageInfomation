<?php
use Libraries\Facades\Route;

class Main
{
    //tạo ra các màn hình và hàm mặc định
    protected $controller;
    protected $action;

    public function __construct()
    {
        
        $path = $this->getPathRequest();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->initMain(Route::routesPost(), $path);
        } else {
            $this->initMain(Route::routesGet(), $path);
        }
        
        if (file_exists("./controllers/" . $this->controller . ".php")) {
            require_once "./controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
        } else {
            $this->routeNotFound();
            return;
        }
        if (method_exists($this->controller, $this->action)) {
            call_user_func_array([$this->controller, $this->action], []);
        } else {
            $this->routeNotFound();
            return;
        }
    }

    function getFullURL() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        $requestUri = $_SERVER['REQUEST_URI'];
    
        return $protocol . $host . $requestUri;
    }

    public function getPathRequest()
    {
        $url = explode("?", explode(base, $this->getFullURL())[1])[0] ?? '';
        return trim($url, '/') ? trim($url, '/') : '/';
    }

    public function routeNotFound()
    {
        $this->controller = 'Errors';
        $this->action = 'error404';
        require_once "./controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        call_user_func_array([$this->controller, $this->action], []);
    }

    public function initMiddleware($middleware)
    {
        if (is_array($middleware)) {
            foreach ($middleware as $item) {
                new $item;
            }
        } else {
            new $middleware;
        }
        return;
    }

    public function initMain($routes, $path)
    {
        foreach ($routes as $route) {
            if (strtolower($path) === strtolower(trim($route->path))) {
                //kiểm tra xem route có middleware hay không, nếu có thì khởi tạo middleware
                $this->controller = $route->controller;
                $this->action = $route->action;
                if (isset($route->middleware) && !empty($route->middleware)) {
                    $this->initMiddleware($route->middleware);
                }
            }
        }
    }


}
