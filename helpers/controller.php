<?php
    class controller
    {

        public static function model($model)
        {
            require_once "./models/".$model.".php";
            return new $model;
        }

        function view($view, $data = [])
        {
            require_once "./views/".$view.".php";
        }
    }
?>