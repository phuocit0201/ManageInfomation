<?php
namespace Controllers;

use Helpers\Controller;
use Models\ContactMethod as ContactMethodModel;
class ContactMethod extends Controller
{
    public $title;

    private ContactMethodModel $contactMedthodModel;

    public function __construct()
    {
        $this->contactMedthodModel = new ContactMethodModel();
    }
    
    public function index()
    {
        $list = $this->contactMedthodModel->all(['id', 'desc']);

        $data = [
            'page' => "admin/contact-method/index",
            'card_title' => CONTACT_METHODS['card_title'],
            'list' => $list,
        ];

        //Hiển thị view
        $this->title = CONTACT_METHODS['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function store()
    {
        $name = $_POST['name'];
        $currentTime = date('Y-m-d H:i:s');
        if ($this->contactMedthodModel->insert([
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

        return redirect(route('admin.contact_methods'));
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($this->contactMedthodModel->delete(['id' => $id])) {
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

        return redirect(route('admin.contact_methods'));
    }

    public function show()
    {
        $profileType = $this->contactMedthodModel->find(['id' => $_GET['id']]);
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

    public function update()
    {
        $id = $_POST['id'];
        $profileType = $this->contactMedthodModel->find(['id' => $id]);
        if ($profileType) {
            if ($this->contactMedthodModel->update(['name' => $_POST['name']], ['id' => $id])) {
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

        return redirect(route('admin.contact_methods'));
    }
}
