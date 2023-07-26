<?php

namespace Controllers;

use Exception;
use Helpers\Controller;
use Models\ProfileInfomation;
use PHPMailer\PHPMailer\PHPMailer;

class Home extends Controller
{
    public $title;
    public $profileInfomationModel;

    public function __construct()
    {
        $this->profileInfomationModel = new ProfileInfomation();
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

    public function create()
    {
        $this->title = 'Nhập thông tin hồ sơ';
        $this->view('client/profile-infomation/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = $_POST['data'];
                $data['created_at'] = date('Y-m-d H:i:s');
                $create = $this->profileInfomationModel->insert($data);
                if (!empty($create)) {
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = Host;
                    $mail->SMTPAuth = SMTPAuth;
                    $mail->Username = Username; // Địa chỉ email của bạn
                    $mail->Password = Password; // Mật khẩu email của bạn
                    $mail->SMTPSecure = SMTPSecure;
                    $mail->Port = Port;
                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom(Email, Name);
                    $mail->addAddress($_POST['data']['mail'], $_POST['data']['full_name']);
                    $mail->Subject = 'Mã Hồ Sơ';
                    $mail->Body = 'Mã hồ sơ của bạn là ' . $create;
                    $mail->send();   
                
                    $_SESSION['notification'] =  [
                        'type' => 'success',
                        'message' => 'Thêm hồ sơ thành công vui lòng kiểm tra email'
                    ];
                } else {
                    $_SESSION['notification'] =  [
                        'type' => 'error',
                        'message' => 'Thêm hồ sơ thất bại'
                    ];
                }
            } catch (Exception $e) {
                $_SESSION['notification'] =  [
                    'type' => 'error',
                    'message' => 'Thêm hồ sơ thất bại'
                ];
                throw new Exception($e->getMessage());
            }
        }

        return redirect(route('enter_profile'));
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
