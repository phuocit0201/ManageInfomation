<?php

namespace Controllers;

use Exception;
use Helpers\Controller;
use Models\Branch;
use Models\ContactMethod;
use Models\Organization;
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
    public $organizationModel;
    public $branchModel;

    public function __construct()
    {
        $this->profileInfomationModel = new ProfileInfomation();
        $this->profileTypesModel = new ProfileTypes();
        $this->receivePersonModel = new ReceivePerson();
        $this->contactMethodModel = new ContactMethod();
        $this->organizationModel = new Organization();
        $this->branchModel = new Branch();
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
            'contact-method' => $this->contactMethodModel->all(),
            'branch' => $this->branchModel->all(),
            'organization' => $this->organizationModel->all()
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
                $dataSendEmail = [
                    'id' => $data['id'],
                    'email' => $data['email'],
                    'name' => $data['full_name'],
                ];
                $this->sendEmailNotify($dataSendEmail);
                
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

            // $PhoneNumber = preg_replace("/^0/", "84", $data['phone_number']);
            // Dữ liệu để gửi đến API Zalo
            $data1 = array(
                "mode"=> "development",
                "phone" => "84869954890",
                // "phone" => $PhoneNumber,
                "template_id" => "291123",
                "template_data" => array(
                    "order_code" => $data['id'],
                    "mahoso" => $data['id'],
                    "customer_name" => $data['full_name'],
                    "status" => "Hồ Sơ Chờ Kiểm Duyệt",
                    "admin_name" => $data['reciever'],
                    "time" => date('d/m/Y'),
                )
            );
            // Chuyển dữ liệu thành JSON
            $jsonData = json_encode($data1);

            // Thay thế YourAccessToken bằng mã truy cập thực tế của bạn
            $accessToken = '7b130pYFzLOULqG2EuVtKnrPGG8xdgGkQJ5H0ZQglIjGRd025CMX1Mv_RpOUrwSoM5P80pEBfIKR6rHoVRYo9o44T75XgQDs7oXnHsoYnK4R9IbaNfFTSHWr17vBZFTyBLOXLMQIyM0FJ3HdSD-1OGnfOtOewf5dOLL-Pnlzdt9BNbvVQEtjU3XINrrGwf59BtDgGGkhjbDDBqq66PEfKMiEUNfCbBPOQYvvK4gVorXl7pa0DhlPAc06Fda_sf100s9QTbZ9wNi3S29ETDZZMob85LCEmFa3AtOqEsZbnI0UJmmMNCF2A1jJBZ1SzkHa3Z8hF5xeXJuULNGLPywY6m8IPIv5hjS042a23Nk5y1K-0nSpPvh383W7EJLahV0WCoas7achu1CG1o56Ou7EH1TUD60nDX7fWs4xb_9Q';

            // Đặt URL của API Zalo
            $url = 'https://business.openapi.zalo.me/message/template';

            // Khai báo yêu cầu cURL
            $ch = curl_init($url);

            // Thiết lập tùy chọn cURL
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'access_token: ' . $accessToken
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

            // Thực hiện yêu cầu
            $response = curl_exec($ch);

            // Kiểm tra lỗi
            if ($response === false) {
                echo 'Lỗi cURL: ' . curl_error($ch);
            }

            // Đóng kết nối cURL
            curl_close($ch);

            // Xử lý phản hồi từ API Zalo
            if ($response) {
                // Phản hồi JSON từ Zalo API
                $responseData = json_decode($response);

                if ($responseData === null) {
                    echo 'Lỗi khi giải mã phản hồi từ Zalo API.';
                } else {
                    // Xử lý dữ liệu phản hồi ở đây
                    print_r($responseData);
                }
            } else {
                echo 'Lỗi khi gửi yêu cầu đến Zalo API.';
            } 
                    return redirect(route('enter_profile'));
    }

    public function search()
    {
        $data = [];
        if (isset($_GET['search'])) {
            $data["profiles"] = $this->profileInfomationModel->search($_GET['search']);
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

    public function sendEmailNotify($data)
    {
        $body = $this->renderHtml($data);
        $emailContent = [
            'email' => $data['email'],
            'subject' => SUBJECT_PROFILE,
            'body' => $body
        ];
        sendEmail($emailContent);
    }

    public function renderHtml($data)
    {
        return '
        <div style="width: 100%;background: #fafafa;padding: 50px 0px;">
            <div style="max-width: 700px; border: 1px solid #999; padding: 20px;margin: 0 auto;background: #fff;">
                <div style="text-align: center;">
                <h3 style="color: #e80000; font-size: 17px;"> ĐẢNG BỘ KHỐI ĐẠI HỌC, CAO ĐẲNG TP. HỒ CHÍ MINH</h3>
                <h3 style="color: #014EC4; font-size: 18px;"> ĐẢNG ỦY TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT THÀNH PHỐ HỒ CHÍ MINH</h3>
                </div>
                <div>
                <p style="color: #014EC4; font-size: 16px;">Chào đồng chí ' . $data['name'] . ';</p>
                <p style="color: #014EC4; font-size: 16px;">Văn phòng Đảng ủy Trường xác nhận đồng chí đã nộp hồ sơ thành công</p>
                <p style="color: #014EC4; font-size: 16px;">Văn phòng cung cấp đến đồng chí:</p>
                <h3 style="text-align: center; color: #014EC4; font-size: 24px;">Mã hồ sơ</h3>
                <h3 style="text-align: center; color: #e80000; font-size: 24px;">' . $data['id'] . '</h3>
                <p style="color: #014EC4; font-size: 16px;">Truy cập vào trang sau để kiểm tra nội dung hồ sơ đã nộp</p>
                <div style="text-align: center; font-size: 16px; padding: 20px 0px;">
                    <a style="text-decoration: none; background-color: #e80000; padding: 10px 20px; border-radius: 20px; color: #fff;" href="https://vanphongdanguy.hcmute.edu.vn/tra-cuu-thong-tin?search=' . $data['id'] . '">Trang Tra Cứu Hồ Sơ</a>
                </div>
                <p style="color: #014EC4; font-size: 16px;">Trân trọng./.</p>
            </div>            
                <div>
                    <h3 style="color: #e80000; font-size: 18px;">VĂN PHÒNG ĐẢNG ỦY</h3>
                    <p style="color: #014EC4; font-weight: 600;font-size: 16px;">Trường Đại học Sư phạm Kỹ thuật Hồ Chí Minh</p>
                    <p style="color: #014EC4; font-weight: 600;font-size: 16px;">Phòng A1001 - Tầng 10 Tòa nhà trung tâm</p>
                    <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Email:</span> vp_danguy@hcmute.edu.vn</p>
                    <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Điện thoại:</span>02837221223(8231)</p>
                    <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Cá nhân:</span> 0961159192(Mr.Đức) - 0983199982(Ms.Nam)</p>
                    <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Website:</span> dangbo.hcmute.edu.vn</p>
                </div>
            </div>
        </div>';
    }
}