<?php

namespace Controllers;

use Exception;
use Helpers\Controller;
use Models\ReturnProfile as ReturnProfileModel;
use Models\Certificate as CertificateModel;
use Models\Organization as ModelsOrganization;
use Models\Branch as BranchModel;

class ReturnProfile extends Controller
{
    public $title;

    private ReturnProfileModel $ReturnProfileModel;

    private CertificateModel $certificateModel;

    private ModelsOrganization $organizationModel;

    private BranchModel $branchModel;

    public function __construct()
    {
        $this->ReturnProfileModel = new ReturnProfileModel();
        $this->certificateModel = new CertificateModel();
        $this->organizationModel = new ModelsOrganization();
        $this->branchModel = new BranchModel();
    }

    public function index()
    {
        $list = $this->ReturnProfileModel->getReturnProfile(['created_at', 'desc']);
        $data = [
            'page' => "admin/return-profile/index",
            'card_title' => RETURN_PROFILE['card_title'],
            'list' => $list,
        ];

        //Hiển thị view
        $this->title = RETURN_PROFILE['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function create()
    {
        $certificates = $this->certificateModel->all(['id', 'desc']);
        $organizations = $this->organizationModel->all(['id', 'desc']);
        $branches = $this->branchModel->all(['id', 'desc']);
        $data = [
            'page' => "admin/return-profile/create",
            'card_title' => RETURN_PROFILE['card_title'],
            'certificates' => $certificates,
            'organizations' => $organizations,
            'branches' => $branches
        ];
        // Hiển thị view
        $this->title = RETURN_PROFILE['title'];
        $this->view('admin/masterlayout', $data);
    }
    

    public function store()
    {
        $dataForm = $_POST['data'];
        $dataForm['id'] = $this->generateRandomString(5);
        $dataForm['created_at'] = date('Y-m-d H:i:s');
        if ($this->ReturnProfileModel->insert($dataForm)) {
            $returnProfile = $this->ReturnProfileModel->getReturnProfileById($dataForm['id']);
            $body = $this->renderHtmlReceivedProfile($returnProfile);
            $emailContent = [
                'email' => $dataForm['email'],
                'subject' => '[VĂN PHÒNG ĐẢNG ỦY] THÔNG BÁO NHẬN HỒ SƠ',
                'body' => $body
            ];
            sendEmail($emailContent);
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

        return redirect(route('admin.return-profile'));
    }

    public function edit()
    {
        $certificates = $this->certificateModel->all(['id', 'desc']);
        $organizations = $this->organizationModel->all(['id', 'desc']);
        $branches = $this->branchModel->all(['id', 'desc']);
        if (!isset($_GET['id'])) {
            return redirect(route('admin.return-profile'));
        }

        $returnProfile = $this->ReturnProfileModel->getReturnProfileById($_GET['id']);

        if (empty($returnProfile)) {
            return redirect(route('admin.return-profile'));
        }

        $data = [
            'page' => "admin/return-profile/edit",
            'card_title' => RETURN_PROFILE['card_title'],
            'certificates' => $certificates,
            'organizations' => $organizations,
            'branches' => $branches,
            'returnProfile' => $returnProfile
        ];
        // Hiển thị view
        $this->title = RETURN_PROFILE['title'];
        $this->view('admin/masterlayout', $data);
    }


    public function update()
    {
        $dataUpdate = $_POST['data'];
        $profileReturnId = $dataUpdate['id'] ?? null;
        $status = $dataUpdate['received_at'];
        if ($profileReturnId == null) {
            return redirect(route('admin.return-profile'));
        }

        $returnProfile = $this->ReturnProfileModel->getReturnProfileById($profileReturnId);
        if (empty($returnProfile)) {
            return redirect(route('admin.return-profile'));
        }

        unset($dataUpdate['id']);
        if ($status == 1) {
            $dataUpdate['received_at'] = date('Y-m-d H:i:s');
        } else {
            $dataUpdate['dsd_at'] = '';
        }

        $isUpdateSuccess = $this->ReturnProfileModel->update($dataUpdate, ['id' => $profileReturnId]);
        if ($isUpdateSuccess) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'messager' => UPDATE_ITEM_SUCCESS
            ];

            if($status == 1) {
                $dataUpdate['id'] = $profileReturnId;
                $body = $this->renderHtmlReceivedProfile1($dataUpdate);
                $emailContent = [
                    'email' => $dataUpdate['email'],
                    'subject' => '[VĂN PHÒNG ĐẢNG ỦY] THÔNG BÁO VỀ VIỆC NHẬN HỒ SƠ ',
                    'data' => $dataUpdate['note2'],
                    'body' => $body
                ];
                sendEmail($emailContent);
            }
            
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'messager' => UPDATE_ITEM_FAILED
            ];
        }

        return redirect(route('admin.return-profile'));
    }

    public function show()
    
    {
        $certificates = $this->certificateModel->all(['id', 'desc']);
        $organizations = $this->organizationModel->all(['id', 'desc']);
        $branches = $this->branchModel->all(['id', 'desc']);
        if (!isset($_GET['id'])) {
            return redirect(route('admin.return-profile'));
        }

        $returnProfile = $this->ReturnProfileModel->getReturnProfileById($_GET['id']);
        $data = [
            'page' => "admin/return-profile/show",
            'card_title' => RETURN_PROFILE['card_title'],
            'certificates' => $certificates,
            'organizations' => $organizations,
            'branches' => $branches,
            'returnProfile' => $returnProfile
        ];
        // Hiển thị view
        $this->title = RETURN_PROFILE['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($this->ReturnProfileModel->delete(['id' => $id])) {
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

        return redirect(route('admin.return-profile'));
    }

    
    private function generateRandomString($length)
    {
        $bytes = random_bytes($length);
        return strtoupper(bin2hex($bytes));
    }

    private function renderHtmlReceivedProfile($data)
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
                        <p style="color: #014EC4; font-size: 16px;">Văn phòng Đảng ủy thông báo đến đồng chí về việc tiếp nhận hồ sơ với thông tin cụ thể như sau:</p>
                        <p style="color: #014EC4; font-size: 16px;"> <b> - Mã số hồ sơ: '. $data['id'] .' <b> </p>
                        <p style="color: #014EC4; font-size: 16px;"> <b> - Loại hồ sơ: '. $data['name_certificate'] .' <b> </p>
                        <p style="color: #014EC4; font-size: 16px;"> <b> - Thông tin chi tiết: </p>
                        <pre style="color: #e80000; font-size: 16px;text-align: justify;"> '. $data['note'] .'</pre>
                        <p style="color: #014EC4; font-size: 16px;"> <b> - Địa điểm: Văn phòng Đảng ủy trường <b> </p>
                        <p style="color: #014EC4; font-size: 16px; text-align: justify;"><i>  - Lưu ý: Đồng chí nhanh chóng liên hệ Văn phòng Đảng ủy trường để tiếp nhận hồ sơ trong vòng 05 ngày làm việc kể từ ngày nhận được thông báo này. 
                        Khi đến, đồng chí vui lòng cung cấp mã số hồ sơ hoặc xuất trình giấy tờ cá nhân để kiểm tra hồ sơ được trả</i></p>
                        <p style="color: #014EC4; font-size: 16px;">Trân trọng./.</p>
                    </div>
                    <div>
                        <h3 style="color: #e80000; font-size: 18px;">VĂN PHÒNG ĐẢNG ỦY</h3>
                        <p style="color: #014EC4; font-weight: 600;font-size: 16px;">Trường Đại học Sư phạm Kỹ thuật Hồ Chí Minh</p>
                        <p style="color: #014EC4; font-weight: 600;font-size: 16px;">Phòng A1001 - Tầng 10 Tòa nhà trung tâm</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Email:</span> vp_danguy@hcmute.edu.vn</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Điện thoại:</span>02837221223(nhánh 8231)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Cá nhân:</span> 096.115.9192(Mr.Đức) - 098.319.9982(Ms.Nam)</p>
                        <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Website:</span> dangbo.hcmute.edu.vn</p>
                </div>
                </div>
            </div>';
    }
    private function renderHtmlReceivedProfile1($dataUpdate)
    {
        return '
        <div style="width: 100%;background: #fafafa;padding: 50px 0px;">
        <div style="max-width: 700px; border: 1px solid #999; padding: 20px;margin: 0 auto;background: #fff;">
            <div style="text-align: center;">
            <h3 style="color: #e80000; font-size: 17px;"> ĐẢNG BỘ KHỐI ĐẠI HỌC, CAO ĐẲNG TP. HỒ CHÍ MINH</h3>
            <h3 style="color: #014EC4; font-size: 18px;"> ĐẢNG ỦY TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT THÀNH PHỐ HỒ CHÍ MINH</h3>
            </div>
            <div>
            <p style="color: #014EC4; font-size: 16px;">Chào đồng chí ' . $dataUpdate['name'] . ';</p>
                <p style="color: #888; font-size: 16px;">Văn phòng Đảng ủy <b>xác nhận</b> đồng chí đã nhận lại hồ sơ từ Văn phòng Đảng ủy với mã hồ sơ là '. $dataUpdate['id'] .' vào lúc '. $dataUpdate['received_at'] .' .</p>
                <p style="color: #014EC4; font-size: 16px;"> <b> - Thông tin chi tiết: </p>
                <pre style="color: #e80000; font-size: 16px;text-align: justify;">'. $dataUpdate['note'] .'</pre>
                <pre style="color: #e80000; font-size: 16px;text-align: justify;">'. $dataUpdate['note2'] .'</pre>
                <p style="color: blue; font-size: 16px;"><i>Mọi thắc mắc về hồ sơ đồng chí có thể liên hệ trực tiếp Văn phòng Đảng ủy Trường</i></p>
                <p style="color: #888; font-size: 16px;">Trân trọng./.</p>
            </div>
            <div>
                <h3 style="color: #e80000; font-size: 18px;">VĂN PHÒNG ĐẢNG ỦY</h3>
                <p style="color: #014EC4; font-weight: 600;font-size: 16px;">Trường Đại học Sư phạm Kỹ thuật Hồ Chí Minh</p>
                <p style="color: #014EC4; font-weight: 600;font-size: 16px;">Phòng A1001 - Tầng 10 Tòa nhà trung tâm</p>
                <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Email:</span> vp_danguy@hcmute.edu.vn</p>
                <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Điện thoại:</span>02837221223(8231)</p>
                <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue;">Cá nhân:</span> 096.115.9192(Mr.Đức) - 098.319.9982(Ms.Nam)</p>
                <p style="color: #888; font-weight: 400;font-size: 16px;"><span style="color: blue; text-decoration: none;">Website:</span> dangbo.hcmute.edu.vn</p>
        </div>
        </div>
    </div>';
    }
}
