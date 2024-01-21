<?php
namespace Models;

use Helpers\Database;

class ReturnProfile extends Database
{
    protected $table = 'return_profile';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }

    public function getReturnProfile($orderBy = ['created_at', 'ASC'])
    {
        $sql = "select rp.*, c.name as certificate_name from return_profile rp join certificate c on rp.id_cetificate = c.id order by " . $orderBy[0] . " " . $orderBy[1] . ";";
        return $this->SelectAllDB($sql);
    }

    public function getReturnProfileById($id)
    {
        $sql = "select rp.*, b.name as name_branch, o.name as name_organization, c.name as name_certificate from return_profile rp 
            join certificate c on rp.id_cetificate = c.id
            join branches b on b.id = rp.id_branches 
            join organizations o on o.id = rp.id_organization 
            where rp.id = '$id';";
        return $this->SelectAllDB($sql)[0] ?? [];
    }
}
