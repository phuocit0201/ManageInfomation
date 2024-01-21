<?php
namespace Models;

use Helpers\Database;
class Certificate extends Database
{
    protected $table = 'certificate';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
?>