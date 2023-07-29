<?php
namespace Models;

use Helpers\Database;
class ReceivePerson extends Database
{
    protected $table = 'receive_persons';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
?>