<?php

namespace Controllers;

use Exception;
use Helpers\Controller;
use Models\ContactMethod;
use Models\ProfileInfomation;
use Models\ProfileTypes;
use Models\ReceivePerson;
use PHPMailer\PHPMailer\PHPMailer;

class Home extends Controller
{
    public $title;
    public $profileInfomationModel;
    public $profileTypesModel;
    public $receivePersonModel;
    public $contactMethodModel;

    public function __construct()
    {
        $this->profileInfomationModel = new ProfileInfomation();
        $this->profileTypesModel = new ProfileTypes();
        $this->receivePersonModel = new ReceivePerson();
        $this->contactMethodModel = new ContactMethod();
    }

    public function index()
    {
        $data = [
            'page' => "client/index",
            'title' => MANAGE['title'],
            'card_title' => MANAGE['card_title'],
        ];
        $this->title = 'Trang chủ';
        $this->view('client/layout', $data);
    }

    public function create()
    {
        $data = [
            'type-profile' => $this->profileTypesModel->all(),
            'receive-person' => $this->receivePersonModel->all(),
            'contact-method' => $this->contactMethodModel->all()
        ];
        $this->title = 'Nhập thông tin hồ sơ';
        $this->view('client/profile-infomation/create', $data);
    }

    public function store()
    {
        try {
            $data = $_POST['data'];
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['id'] = $this->generateRandomString(5);
            $create = $this->profileInfomationModel->insert($data);
            if ($create) {
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
                $mail->addAddress($_POST['data']['email'], $_POST['data']['full_name']);
                $mail->Subject = 'Mã Hồ Sơ';
                $mail->Body = 'Mã hồ sơ của bạn là ' . $data['id'];
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
                setOldValue($_POST['data']);
            }
        } catch (Exception $e) {
            $_SESSION['notification'] =  [
                'type' => 'error',
                'message' => 'Thêm hồ sơ thất bại'
            ];
            throw new Exception($e->getMessage());
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

    function generateRandomString($length)
    {
        $bytes = random_bytes($length);
        return strtoupper(bin2hex($bytes));
    }
}
