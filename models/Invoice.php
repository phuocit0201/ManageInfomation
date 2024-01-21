<?php
namespace Models;

use Helpers\Database;

class Invoice extends Database
{
    protected $table = 'invoice';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }

    public function getInvoiceAll($orderBy = ['created_at', 'ASC'])
    {
        $sql = "SELECT i.*, b.name as branch_name, o.name as organization_name FROM invoice i join branches b on i.id_branches = b.id join organizations o on o.id = i. id_organization order by " . $orderBy[0] . " " . $orderBy[1] . ";";
        return $this->SelectAllDB($sql);
    }

    public function getInvoiceById($id)
    {
        $sql = "select iv.*, b.name as name_branch, o.name as name_organization, rp.name as name_receive_person
        from invoice iv
        join branches b on b.id = iv.id_branches 
        join organizations o on o.id = iv.id_organization
        join receive_persons rp on rp.id = iv.receive_person_id
        where iv.id = '$id';";
        return $this->SelectAllDB($sql)[0] ?? [];
    }

}
