<?php
namespace Models;

use Helpers\Database;
class ContactMethod extends Database
{
    protected $table = 'contact_methods';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
?>