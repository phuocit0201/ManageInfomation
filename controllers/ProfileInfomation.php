<?php
namespace Controllers;

use Helpers\Controller;
use Models\Branch;
use Models\ContactMethod;
use Models\Organization;
use Models\ProfileInfomation as ProfileInfomationModel;
use Models\ProfileTypes;
use Models\ReceivePerson;

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
        $list = $this->profileInfomationModel->all(['id', 'desc']);
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

        return redirect(route('admin.receive_persons'));
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

        return redirect(route('admin.receive_persons'));
    }

    public function show()
    {
        $profileInfomation = $this->profileInfomationModel->find(['id' => $_GET['id'] ?? null]);

        if(empty($profileInfomation)) {
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

        if(empty($profileInfomation)) {
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
        $data = $_POST['data'];
        $profileType = $this->profileInfomationModel->find(['id' => $id]);
        if ($profileType) {
            if ($this->profileInfomationModel->update($data, ['id' => $id])) {
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

    private function getValueStatus($status)
    {
        switch($status) {
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
        }

        return null;
    }
}
