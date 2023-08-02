<?php
namespace Controllers;

use Helpers\Controller;
class Dashboard extends Controller
{
    public $title;
    public function __construct()
    {
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
            'page' => "admin/dashboard/index",
            'card_title' => DASHBOARD['card_title'],
            'list' => $list,
        ];

        $this->title = DASHBOARD['title'];
        //Hiển thị view
        $this->view('admin/masterlayout', $data);
    }
}
