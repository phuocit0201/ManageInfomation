<?php
class Home extends controller
{
    private ProfileInfomation $profileInfomationModel;
    public $title;
    public function __construct()
    {
        $this->profileInfomationModel = controller::model('ProfileInfomation');
    }

    public function index()
    {
        $data = [
            'page' => "client/index",
            'title' => MANAGE['title'],
            'card_title' => MANAGE['card_title'],
            'active' => 1,
        ];
        $this->title = 'Trang chủ';
        $this->view('client/layout', $data);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data'];
            $data['created_at'] = date('Y-m-d H:i:s');
            if ($this->profileInfomationModel->insert($data)) {
                $_SESSION['notification'] =  [
                    'type' => 'success',
                    'message' => 'Thêm hồ sơ thành công'
                ];
            } else {
                $_SESSION['notification'] =  [
                    'type' => 'error',
                    'message' => 'Thêm hồ sơ thất bại'
                ];
            }
        }
        $this->title = 'Nhập thông tin hồ sơ';
        $this->view('client/profile-infomation/create');
    }

    public function search()
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data["profile"] = $this->profileInfomationModel->find(['id' => $_GET['search']]);
            $data["keyword"] =  $_GET['search'];
        }
        $this->title = 'Tra cứu hồ sơ';
        $this->view('client/profile-infomation/show', $data);
    }
}
