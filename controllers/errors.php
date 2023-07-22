<?php
class errors extends controller
{
    public function __construct()
    {
    }

    public function error404()
    {
        $this->view('error/404');
    }
}
