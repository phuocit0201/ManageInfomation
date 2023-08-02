<?php
namespace Controllers;

use Helpers\Controller;
use Models\ProfileInfomation as ProfileInfomationModel;
class ProfileInfomation extends Controller
{
    public $title;

    private ProfileInfomationModel $profileInfomationModel;

    public function __construct()
    {
        $this->profileInfomationModel = new ProfileInfomationModel();
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
        $profileInfomation['status'] = $this->getValueStatus($profileInfomation['status']);
        $data = [
            'page' => "admin/profile-infomation/edit",
            'card_title' => PROFILE_INFOMATION['edit'],
            'profile_infomation' => $profileInfomation
        ];
        $this->title = PROFILE_INFOMATION['edit'];
        $this->view('admin/masterlayout', $data);
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $profileType = $this->profileInfomationModel->find(['id' => $id]);
        if ($profileType) {
            if ($this->profileInfomationModel->update(['name' => $_POST['name']], ['id' => $id])) {
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

        return redirect(route('admin.receive_persons'));
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
