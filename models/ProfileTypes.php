<?php 
class ProfileTypes extends Database
{
    protected $table = 'profile_types';
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->table;
    }
}
?>