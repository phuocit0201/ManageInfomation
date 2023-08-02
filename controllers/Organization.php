<?php
namespace Controllers;

use Helpers\Controller;
use Models\Organization as ModelsOrganization;
class Organization extends Controller
{
    public $title;

    private ModelsOrganization $organizationModel;

    public function __construct()
    {
        $this->organizationModel = new ModelsOrganization();
    }
    
    public function index()
    {
        $list = $this->organizationModel->all(['id', 'desc']);

        $data = [
            'page' => "admin/organization/index",
            'card_title' => ORGANIZATION['card_title'],
            'list' => $list,
        ];

        //Hiển thị view
        $this->title = ORGANIZATION['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $currentTime = date('Y-m-d H:i:s');
            if ($this->organizationModel->insert([
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

        return redirect(route('admin.organizations'));
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            if ($this->organizationModel->delete(['id' => $id])) {
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

        return redirect(route('admin.organizations'));
    }

    public function show()
    {
        $profileType = $this->organizationModel->find(['id' => $_GET['id']]);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $profileType = $this->organizationModel->find(['id' => $id]);
            if ($profileType) {
                if ($this->organizationModel->update(['name' => $_POST['name']], ['id' => $id])) {
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

        return redirect(route('admin.organizations'));
    }
}
