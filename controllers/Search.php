<?php
namespace Controllers;

use Helpers\Controller;
class Search extends Controller
{
    public $title;
    public function index()
    {

        $data = [
            'page' => "admin/search/index",
            'card_title' => SEARCH['card_title'],
        ];

        //Hiển thị view
        $this->title = SEARCH['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function show()
    {

        $data = [
            'page' => "admin/search/show",
            'card_title' => SEARCH['show'],
        ];

        //Hiển thị view
        $this->title = SEARCH['title'];
        $this->view('admin/masterlayout', $data);
    }


}
