<?php

namespace Controllers;

use Exception;
use Helpers\Controller;
use Models\Branch;
use Models\ContactMethod;
use Models\Organization;
use Models\ProfileInfomation as ProfileInfomationModel;
use Models\ProfileTypes;
use Models\ReceivePerson;
use PHPExcel;
use PHPExcel_Exception;
use PHPExcel_Writer_Excel2007;

class ProfileInfomation extends Controller
{
    public $title;

    private ProfileInfomationModel $profileInfomationModel;
    private $profileTypesModel;
    private $receivePersonModel;
    private $contactMethodModel;
    private $organizationModel;
    private $branchModel;

    public function __construct()
    {
        $this->profileInfomationModel = new ProfileInfomationModel();
        $this->profileTypesModel = new ProfileTypes();
        $this->receivePersonModel = new ReceivePerson();
        $this->contactMethodModel = new ContactMethod();
        $this->organizationModel = new Organization();
        $this->branchModel = new Branch();
    }

    public function index()
    {
        $list = $this->profileInfomationModel->all(['created_at', 'desc']);
        $data = [
            'page' => "admin/profile-infomation/index",
            'card_title' => PROFILE_INFOMATION['card_title'],
            'list' => $list,
        ];

        //Hiển thị view
        $this->title = PROFILE_INFOMATION['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function store()
    {
        $name = $_POST['name'];
        $currentTime = date('Y-m-d H:i:s');
        if ($this->profileInfomationModel->insert([
            'name' => $name,
            'created_at' => $currentTime,
        ])) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'messager' => CREATE_ITEM_SUCCESS
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'messager' => CREATE_ITEM_FAILED
            ];
        }

        return redirect(route('admin.profile_infomation'));
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($this->profileInfomationModel->delete(['id' => $id])) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'messager' => DELETE_ITEM_SUCCESS
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'messager' => DELETE_ITEM_FAILED
            ];
        }

        return redirect(route('admin.profile_infomation'));
    }

    public function show()
    {
        $profileInfomation = $this->profileInfomationModel->find(['id' => $_GET['id'] ?? null]);

        if (empty($profileInfomation)) {
            $this->view('error/404');
            return;
        }
        $profileInfomation['status'] = $this->getValueStatus($profileInfomation['status']);

        $data = [
            'page' => "admin/profile-infomation/show",
            'card_title' => PROFILE_INFOMATION['show'],
            'profile_infomation' => $profileInfomation
        ];
        $this->title = PROFILE_INFOMATION['show'];
        $this->view('admin/masterlayout', $data);
    }

    public function edit()
    {
        $profileInfomation = $this->profileInfomationModel->find(['id' => $_GET['id'] ?? null]);

        if (empty($profileInfomation)) {
            $this->view('error/404');
            return;
        }
        $data = [
            'page' => "admin/profile-infomation/edit",
            'card_title' => PROFILE_INFOMATION['edit'],
            'profile_infomation' => $profileInfomation,
            'type-profile' => $this->profileTypesModel->all(),
            'receive-person' => $this->receivePersonModel->all(),
            'contact-method' => $this->contactMethodModel->all(),
            'branch' => $this->branchModel->all(),
            'organization' => $this->organizationModel->all()
        ];
        $this->title = PROFILE_INFOMATION['edit'];
        $this->view('admin/masterlayout', $data);
    }

    public function update()
    {
        $id = $_POST['data']['id'] ?? null;
        $profileType = $this->profileInfomationModel->find(['id' => $id]);
        if ($profileType) {
            $params = $_POST['data'];
            $date = $this->setTimeStatusProfile($_POST['data']['status'], $profileType);
            $data = array_merge($date, $params);
            if ($this->profileInfomationModel->update($data, ['id' => $id])) {
                $this->sendEmailNotify($data, $data['status']);
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'messager' => UPDATE_SUCCESS
                ];
            } else {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'messager' => UPDATE_FAILED
                ];
            }
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'messager' => ITEM_NOT_FOUND
            ];
        }

        return redirect(route('admin.profile_infomation_update') . '?id=' . $id);
    }

    public function exportExcel()
    {
        try {
            $limit = $_POST['limit'] ?? 1000;
            $offset = $_POST['offset'] - 1 ?? 0;
            $list = $this->profileInfomationModel->paginate(['created_at', 'desc'], $limit, $offset);
            $exportExcel = new PHPExcel();
            $exportExcel->setActiveSheetIndex();
            $sheet = $exportExcel->getActiveSheet()->setTitle('Hồ Sơ');
            $row = 1;
            $sheet->setCellValue('A' . $row, 'Mã Hồ Sơ');
            $sheet->setCellValue('B' . $row, 'Họ Và Tên');
            $sheet->setCellValue('C' . $row, 'Số Điện Thoại');
            $sheet->setCellValue('D' . $row, 'Email');
            $sheet->setCellValue('E' . $row, 'Chi Bộ');
            $sheet->setCellValue('F' . $row, 'Đơn Vị');
            $sheet->setCellValue('G' . $row, 'Loại Hồ Sơ');
            $sheet->setCellValue('H' . $row, 'Tên Hồ Sơ');
            $sheet->setCellValue('I' . $row, 'Số Lượng Hồ Sơ');
            $sheet->setCellValue('J' . $row, 'Người Tiếp Nhận');
            $sheet->setCellValue('K' . $row, 'Phương Thức Liên Hệ');
            $sheet->setCellValue('L' . $row, 'Trạng Thái');
            $sheet->setCellValue('M' . $row, 'Ngày Nộp Hồ Sơ');
            $sheet->setCellValue('N' . $row, 'Ngày Nhận Hồ Sơ');
            $sheet->setCellValue('O' . $row, 'Ngày Xử Lý Hồ Sơ');
            $sheet->setCellValue('P' . $row, 'Ngày Trả Hò Hồ Sơ');
            $sheet->setCellValue('Q' . $row, 'Ngày Chỉnh Sửa Và Bổ Sung Hồ Sơ');
            $sheet->setCellValue('R' . $row, 'Ngày Nhận Lại Hồ Sơ Từ VPĐU');
            foreach ($list as $profile) {
                $row++;
                $sheet->setCellValue('A' . $row, $profile['id']);
                $sheet->setCellValue('B' . $row, $profile['full_name']);
                $sheet->setCellValue('C' . $row, $profile['phone_number']);
                $sheet->setCellValue('D' . $row, $profile['email']);
                $sheet->setCellValue('E' . $row, $profile['branch']);
                $sheet->setCellValue('F' . $row, $profile['organization']);
                $sheet->setCellValue('G' . $row, $profile['type_profile']);
                $sheet->setCellValue('H' . $row, $profile['name_profile']);
                $sheet->setCellValue('I' . $row, $profile['quantity_profile']);
                $sheet->setCellValue('J' . $row, $profile['reciever']);
                $sheet->setCellValue('K' . $row, $profile['contact_method']);
                $sheet->setCellValue('L' . $row, $this->getValueStatus($profile['status']));
                $sheet->setCellValue('M' . $row, $profile['created_at']);
                $sheet->setCellValue('N' . $row, $profile['date_1']);
                $sheet->setCellValue('O' . $row, $profile['date_2']);
                $sheet->setCellValue('P' . $row, $profile['date_3']);
                $sheet->setCellValue('Q' . $row, $profile['date_4']);
                $sheet->setCellValue('R' . $row, $profile['date_5']);
            }
            $writerExcel = new PHPExcel_Writer_Excel2007($exportExcel);
            NAME_PROFILE_EXCEL;
            $fileName = url_excel . NAME_PROFILE_EXCEL;
            $writerExcel->save($fileName);

            $response = [
                'status' => true,
                'url' => base . $fileName,
                'file_name' => NAME_PROFILE_EXCEL,
            ];
            echo json_encode($response);
        } catch (Exception) {
            echo json_encode(['status' => false, 'mess' => 'Xuất file thất bại vui lòng thử lại']);
        }
    }

    private function getValueStatus($status)
    {
        switch ($status) {
            case STATUS_PROFILE_INFO[0]['value']:
                return STATUS_PROFILE_INFO[0]['text'];
            case STATUS_PROFILE_INFO[1]['value']:
                return STATUS_PROFILE_INFO[1]['text'];
            case STATUS_PROFILE_INFO[2]['value']:
                return STATUS_PROFILE_INFO[2]['text'];
            case STATUS_PROFILE_INFO[3]['value']:
                return STATUS_PROFILE_INFO[3]['text'];
            case STATUS_PROFILE_INFO[4]['value']:
                return STATUS_PROFILE_INFO[4]['text'];
            case STATUS_PROFILE_INFO[5]['value']:
                return STATUS_PROFILE_INFO[5]['text'];
            case STATUS_PROFILE_INFO[6]['value']:
                return STATUS_PROFILE_INFO[6]['text'];
        }

        return null;
    }

    public function setTimeStatusProfile($status, $profile)
    {
        $data = [
            'date_1' => null,
            'date_2' => null,
            'date_3' => null,
            'date_4' => null,
            'date_5' => null,
            'date_6' => null,
        ];
        $currentTime = date('Y-m-d H:i:s');
        switch ($status) {
            case '1':
                return $data;
            case '2':
                $data['date_1'] = $currentTime;
                return $data;
            case '3':
                $data['date_1'] = (empty($profile['date_1'])) ? $currentTime : $profile['date_1'];
                $data['date_2'] = $currentTime;
                return $data;
            case '4':
                $data['date_1'] = (empty($profile['date_1'])) ? $currentTime : $profile['date_1'];
                $data['date_2'] = (empty($profile['date_2'])) ? $currentTime : $profile['date_2'];
                $data['date_3'] = $currentTime;
                return $data;
            case '5':
                $data['date_1'] = (empty($profile['date_1'])) ? $currentTime : $profile['date_1'];
                $data['date_2'] = (empty($profile['date_2'])) ? $currentTime : $profile['date_2'];
                $data['date_3'] = (empty($profile['date_3'])) ? $currentTime : $profile['date_3'];
                $data['date_4'] = $currentTime;
                return $data;
            case '6':
                $data['date_1'] = (empty($profile['date_1'])) ? $currentTime : $profile['date_1'];
                $data['date_2'] = (empty($profile['date_2'])) ? $currentTime : $profile['date_2'];
                $data['date_3'] = (empty($profile['date_3'])) ? $currentTime : $profile['date_3'];
                $data['date_4'] = (empty($profile['date_4'])) ? $currentTime : $profile['date_4'];
                $data['date_5'] = $currentTime;
                $data['date_6'] = $currentTime;
                return $data;
            case '7':
                $data['date_1'] = (empty($profile['date_1'])) ? $currentTime : $profile['date_1'];
                $data['date_2'] = (empty($profile['date_2'])) ? $currentTime : $profile['date_2'];
                $data['date_3'] = (empty($profile['date_3'])) ? $currentTime : $profile['date_3'];
                $data['date_4'] = (empty($profile['date_4'])) ? $currentTime : $profile['date_4'];
                $data['date_5'] = null;
                $data['date_6'] = $currentTime;
                return $data;
        }
    }

    private function sendEmailNotify($data, $status)
    {
        $emailContent = [];
        switch ($status) {
            case STATUS_PROFILE_INFO[0]['value']:
            case STATUS_PROFILE_INFO[1]['value']:
            case STATUS_PROFILE_INFO[2]['value']:
            case STATUS_PROFILE_INFO[3]['value']:
                return;
            case STATUS_PROFILE_INFO[4]['value']:
                $body = $this->renderHtmlEditProfile($data);
                $emailContent = [
                    'email' => $data['email'],
                    'subject' => SUBJECT_EDIT_PROFILE,
                    'body' => $body
                ];
                break;
            case STATUS_PROFILE_INFO[5]['value']:
                $body = $this->renderHtmlReceivedProfile($data);
                $emailContent = [
                    'email' => $data['email'],
                    'subject' => SUBJECT_RECEIVED_PROFILE,
                    'body' => $body
                ];
                break;
            case STATUS_PROFILE_INFO[6]['value']:
                $body = $this->renderHtmlSaveProfile($data);
                $emailContent = [
                    'email' => $data['email'],
                    'subject' => SUBJECT_RECEIVED_PROFILE,
                    'body' => $body
                ];
                break;
        }

        sendEmail($emailContent);
    }

    private function renderHtmlEditProfile($data)
    {
        return '
            <div style="width: 100%;background: #fafafa;padding: 50px 0px;">
                <div style="max-width: 700px; border: 1px solid #999; padding: 20px;margin: 0 auto;background: #fff;">
                    <div style="text-align: center;">
                        <img style="width: 100px;" src="https://i.imgur.com/w8b4ba4.jpg" alt="">
                        <img style="width: 100px;" src="https://i.imgur.com/4r7yGVD.png" alt="">
                    </div>
                    <div>
                        <p style="color: red; font-size: 18px; font-weight: 600;">Chào đồng chí '. $data['name'] .'</p>
                        <p style="color: #888; font-size: 16px;">Văn phòng Đảng ủy đã nhận và kiểm tra hồ sơ của Đồng Chí và có yêu cầu Đ/C chỉnh sửa và bổ sung các ý sau</p>
                        <pre style="color: #888; font-size: 16px;">'. $data['note'] .'</pre>
                        <p style="color: #888; font-size: 16px;">Các Đ/C lưu ý bổ sung các nội dung được nêu trên về văn phòng Đảng ủy để có thể hoàn thiện hồ sơ</p>
                        <p style="color: #888; font-size: 16px;">Trân trọng</p>
                    </div>
                    <div>
                        <h3 style="color: red; font-size: 20px;">VĂN PHÒNG ĐẢNG ỦY</h3>
                        <p style="color: #888; font-weight: 600;font-size: 16px;">Trường Đại học Sư phạm Kỹ thuật Hồ Chí Minh</p>
                        <p style="color: #888; font-weight: 600;font-size: 16px;">Phòng A1001 - Tầng 10 Tòa nhà trung tâm</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Email:</span> vp_danguy@hcmute.udn.vn</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Điện thoại:</span>02837221223(8231)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Cá nhân:</span> 0961159192(Mr.Đức)-0983199982(Ms.Nam)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Website:</span> danbo.hcmute.udn.vn</p>
                    </div>
                </div>
            </div>';
    }

    private function renderHtmlReceivedProfile($data)
    {
        return '
            <div style="width: 100%;background: #fafafa;padding: 50px 0px;">
                <div style="max-width: 700px; border: 1px solid #999; padding: 20px;margin: 0 auto;background: #fff;">
                    <div style="text-align: center;">
                        <img style="width: 100px;" src="https://i.imgur.com/w8b4ba4.jpg" alt="">
                        <img style="width: 100px;" src="https://i.imgur.com/4r7yGVD.png" alt="">
                    </div>
                    <div>
                        <p style="color: red; font-size: 18px; font-weight: 600;">Chào đồng chí '. $data['full_name'] .'</p>
                        <p style="color: #888; font-size: 16px;">Văn phòng Đảng ủy <b>xác nhận</b> Đ/C đã nhận lại hồ sơ từ VPĐU với mã hồ sơ là '. $data['id'] .' tại Văn phòng Đảng ủy vào lúc '. $data['date_5'] .'</p>
                        <p style="color: blue; font-size: 16px;"><i>Mọi thắc mắc về hồ sơ có thể liên hệ trực tiếp Văn phòng Đảng ủy</i></p>
                        <p style="color: #888; font-size: 16px;">Trân trọng</p>
                    </div>
                    <div>
                        <h3 style="color: red; font-size: 20px;">VĂN PHÒNG ĐẢNG ỦY</h3>
                        <p style="color: #888; font-weight: 600;font-size: 16px;">Trường Đại học Sư phạm Kỹ thuật Hồ Chí Minh</p>
                        <p style="color: #888; font-weight: 600;font-size: 16px;">Phòng A1001 - Tầng 10 Tòa nhà trung tâm</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Email:</span> vp_danguy@hcmute.udn.vn</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Điện thoại:</span>02837221223(8231)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Cá nhân:</span> 0961159192(Mr.Đức)-0983199982(Ms.Nam)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Website:</span> danbo.hcmute.udn.vn</p>
                    </div>
                </div>
            </div>';
    }

    private function renderHtmlSaveProfile($data)
    {
        return '
            <div style="width: 100%;background: #fafafa;padding: 50px 0px;">
                <div style="max-width: 700px; border: 1px solid #999; padding: 20px;margin: 0 auto;background: #fff;">
                    <div style="text-align: center;">
                        <img style="width: 100px;" src="https://i.imgur.com/w8b4ba4.jpg" alt="">
                        <img style="width: 100px;" src="https://i.imgur.com/4r7yGVD.png" alt="">
                    </div>
                    <div>
                        <p style="color: red; font-size: 18px; font-weight: 600;">Chào đồng chí '. $data['full_name'] .'</p>
                        <p style="color: #888; font-size: 16px;">Văn phòng Đảng ủy <b>Đã tiếp nhận và xử lý hoàn thành hồ sơ của Đ/C</b> với mã hồ sơ là '. $data['id'] .'. <b>Hồ sơ đã được lưu giữ tại</b> Văn phòng Đảng ủy vào lúc '. $data['date_6'] .'</p>
                        <p style="color: blue; font-size: 16px;"><i>Mọi thắc mắc về hồ sơ có thể liên hệ trực tiếp Văn phòng Đảng ủy</i></p>
                        <p style="color: #888; font-size: 16px;">Trân trọng</p>
                    </div>
                    <div>
                        <h3 style="color: red; font-size: 20px;">VĂN PHÒNG ĐẢNG ỦY</h3>
                        <p style="color: #888; font-weight: 600;font-size: 16px;">Trường Đại học Sư phạm Kỹ thuật Hồ Chí Minh</p>
                        <p style="color: #888; font-weight: 600;font-size: 16px;">Phòng A1001 - Tầng 10 Tòa nhà trung tâm</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Email:</span> vp_danguy@hcmute.udn.vn</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Điện thoại:</span>02837221223(8231)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Cá nhân:</span> 0961159192(Mr.Đức)-0983199982(Ms.Nam)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Website:</span> danbo.hcmute.udn.vn</p>
                    </div>
                </div>
            </div>';
    }
}
