<?php
namespace Helpers;

class Controller
{

    function view($view, $data = [])
    {
        require_once "./views/" . $view . ".php";
    }
}
