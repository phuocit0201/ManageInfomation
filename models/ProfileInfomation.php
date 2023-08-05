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

    public function getStatistical()
    {
        $sql = "SELECT status, count(*) as sum FROM $this->model group by status;";
        return $this->SelectAllDB($sql);
    }

    public function getQuantityProfileByMonth($month, $year)
    {
        $sql = "select day(created_at) as day, count(*) as total from $this->model
        where month(created_at) = $month
        and year(created_at) = $year
        group by day(created_at);";
        return $this->SelectAllDB($sql);
    }

    public function search($param)
    {
        $sql = "SELECT * FROM $this->model where id = '$param' or phone_number = '$param'";
        return $this->SelectAllDB($sql);
    }
}
