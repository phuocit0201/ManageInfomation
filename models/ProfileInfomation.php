<?php
namespace Models;

use Helpers\Database;

class ProfileInfomation extends Database
{
    protected $table = 'profile_infomations';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
