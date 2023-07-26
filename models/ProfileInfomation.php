<?php
namespace Models;

use Helpers\Database;

class ProfileInfomation extends Database
{
    protected $table = 'profile_infomation';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
