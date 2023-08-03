<?php

namespace Controllers;

use DateInterval;
use DatePeriod;
use DateTime;
use Helpers\Controller;
use Models\ProfileInfomation;

class Dashboard extends Controller
{
    public $title;
    private ProfileInfomation $profileInfomationModel;

    public function __construct()
    {
        $this->profileInfomationModel = new ProfileInfomation();
    }

    public function home()
    {
        $currentDate = new DateTime();
        $month = $_GET['month'] ?? $currentDate->format("m");
        $year = $_GET['year'] ?? $currentDate->format("Y");
        
        $result = $this->profileInfomationModel->getStatistical();
        $statistical = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
        ];
        foreach (STATUS_PROFILE_INFO as $status) {
            foreach ($result as $item) {
                if ($status['value'] == $item['status']) {
                    $statistical[$item['status']] = $item['sum'];
                }
            }
        }
        $statisticalProifile = $this->profileInfomationModel->getQuantityProfileByMonth($month, $year);
        $days = $this->getAllDayOfMonth($month, $year);
        $params = array();
        foreach ($days as $day) {
            $params[] = 0;
            foreach ($statisticalProifile as $item) {
                if ($item['day'] == $day) {
                    array_pop($params);
                    $params[] = $item['total'];
                }
            }
        }

        $data = [
            'page' => "admin/dashboard/index",
            'card_title' => DASHBOARD['card_title'],
            'statistical' => $statistical,
            'params' => json_encode($params),
            'days' => json_encode($days),
            'month' => $month,
            'year' => $year
        ];
        $this->title = DASHBOARD['title'];
        //Hiển thị view
        $this->view('admin/masterlayout', $data);
    }

    private function getAllDayOfMonth($month, $year)
    {
        $numberDay = cal_days_in_month(0, $month, $year);
        $days = array();
        for ($i = 1; $i <= $numberDay; $i++) {
            array_push($days, $i);
        }
        return $days;
    }
}
