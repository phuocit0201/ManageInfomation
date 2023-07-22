<?php

class Users extends Database
{
    protected $table = 'users';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
