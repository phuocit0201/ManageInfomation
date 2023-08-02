<?php
namespace Models;

use Helpers\Database;
class Branch extends Database
{
    protected $table = 'branches';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
?>