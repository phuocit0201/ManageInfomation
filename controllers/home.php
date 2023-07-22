<?php
class home extends controller
{
    public $title;
    public function __construct()
    {
    }

    public function home()
    {
        $data = [
            'page' => "client/index",
            'title' => MANAGE['title'],
            'card_title' => MANAGE['card_title'],
            'active' => 1,
        ];
        $this->title = 'Trang chủ';
        $this->view('client/layout', $data);
    }
}
