<?php
namespace Controllers;

use Helpers\Controller;
class SumLink extends Controller
{
    public $title;
    public function index()
    {

        $data = [
            'page' => "admin/sum-link/index",
            'card_title' => SUM_LINK['card_title'],
        ];

        //Hiển thị view
        $this->title = SUM_LINK['title'];
        $this->view('admin/masterlayout', $data);
    }

}
