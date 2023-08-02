<?php
namespace Controllers;

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
        $list = [
            [
                'id' => 1,
                'created_at' => '2023-20-07 19:00:00',
                'status' => 1
            ]
        ];
       
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
        $data = [
            'page' => "admin/dashboard/index",
            'card_title' => DASHBOARD['card_title'],
            'list' => $list,
            'statistical' => $statistical
        ];
        $this->title = DASHBOARD['title'];
        //Hiển thị view
        $this->view('admin/masterlayout', $data);
    }
}
