<?php
class main
{
    //tạo ra các màn hình và hàm mặc định
    protected $controller = "Errors";
    protected $acction = "error404";
    protected $param = [];

    public function __construct()
    {
        $url = $_GET['url'] ?? '';
        $path = trim($url, '/') ? trim($url, '/') : '/';
        foreach (routes as $route) {
            
            if (strtolower($path) == strtolower(trim($route['path']))) {
                $this->controller = $route['controller'];
                $this->acction = $route['action'];
                //kiểm tra xem route có middleware hay không, nếu có thì khởi tạo middleware
                if (isset($route['middleware'])) {
                    new $route['middleware'];
                }

            }
        }
        if (file_exists("./controllers/" . $this->controller . ".php")) {
            require_once "./controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
        } else {
            return redirect('errors/error404');
        }
        if (method_exists($this->controller, $this->acction)) {
            call_user_func_array([$this->controller, $this->acction], []);
        }
        
    }
}
