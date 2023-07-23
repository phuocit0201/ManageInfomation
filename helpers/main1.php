<?php
class main1
{
    //tạo ra các màn hình và hàm mặc định
    protected $controller = "home";
    protected $acction = "home";
    protected $param = [];

    public function __construct()
    {
        $arr = $this->UrlProcess();
        //xử lý màn hình nào sẽ được chạy trong thư mục mvc/controllers
        if ($arr != null) {
            if (isset($arr[0])) {
                if (file_exists("./controllers/" . $arr[0] . ".php")) {
                    $this->controller = $arr[0];
                } else {
                    header("location:" . base . 'errors/error404');
                    return;
                }
                unset($arr[0]);
            }
            require_once "./controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            //xử lý hàm nào sẽ được chạy sau khi vào màn hình
            if (isset($arr[1])) {
                if (method_exists($this->controller, $arr[1])) {
                    $this->acction = $arr[1];
                } else {
                    header("location:" . base . 'error404');
                    return;
                }
                unset($arr[1]);
            }
        } else {
            $this->controller = "home";
            require_once "./controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            $this->acction = "home";
        }

        //xử lý biến được truyền vào hàm
        $this->param = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->acction], $this->param);
    }

    //xử lí url cắt dấu / từ trên thanh địa chỉ
    function UrlProcess()
    {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(trim($_GET['url'], "/")));
        }
    }
}
