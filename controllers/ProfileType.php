<?php
namespace Controllers;

use Helpers\Controller;
use Models\ProfileTypes;
class ProfileType extends Controller
{
    public $title;

    private ProfileTypes $profileTypeModel;

    public function __construct()
    {
        $this->profileTypeModel = new ProfileTypes();
    }
    
    public function index()
    {
        $list = $this->profileTypeModel->all(['id', 'desc']);

        $data = [
            'page' => "admin/profile-type/index",
            'card_title' => PROFILE_TYPE['card_title'],
            'list' => $list,
        ];

        //Hiển thị view
        $this->title = PROFILE_TYPE['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function storeProfileType()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $currentTime = date('Y-m-d H:i:s');
            if ($this->profileTypeModel->insert([
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
        }

        return redirect('admin/profile-type');
    }

    public function deleteProfileType()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            if ($this->profileTypeModel->delete(['id' => $id])) {
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
        }

        return redirect(route('admin.profile_type'));
    }

    public function showProfileType()
    {
        $profileType = $this->profileTypeModel->find(['id' => $_GET['id']]);
        if($profileType) {
            echo json_encode([
                'status' => 'true',
                'data' => $profileType
            ]);
            return;
        }

        echo json_encode([
            'data' => []
        ]);
        return;
    }

    public function updateProfileType()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $profileType = $this->profileTypeModel->find(['id' => $id]);
            if ($profileType) {
                if ($this->profileTypeModel->update(['name' => $_POST['name']], ['id' => $id])) {
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
        }

        return redirect(route('admin.profile_type'));
    }
}
