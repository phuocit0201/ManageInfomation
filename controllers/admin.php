<?php
class admin extends controller
{

    public function __construct()
    {
        //kiểm tra người dùng đăng nhập
        new AdminAuth();
    }

    public function home()
    {
        $list = [
            [
                'id' => 1,
                'created_at' => '2023-20-07 19:00:00',
                'status' => 1
            ]
        ];
        $data = [
            'page' => "admin/manage/index",
            'title' => MANAGE['title'],
            'card_title' => MANAGE['card_title'],
            'active' => 1,
            'list' => $list,
        ];

        //Hiển thị view
        $this->view('admin/masterlayout', $data);
    }
}
