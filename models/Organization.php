<?php
namespace Models;

use Helpers\Database;
class Organization extends Database
{
    protected $table = 'organizations';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
?>