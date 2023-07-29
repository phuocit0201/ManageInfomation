<?php
namespace Controllers;

use Helpers\Controller;
use Models\ReceivePerson as ReceivePersonModel;
class ReceivePerson extends Controller
{
    public $title;

    private ReceivePersonModel $receivePersonModel;

    public function __construct()
    {
        $this->receivePersonModel = new ReceivePersonModel();
    }
    
    public function index()
    {
        $list = $this->receivePersonModel->all(['id', 'desc']);

        $data = [
            'page' => "admin/receive-person/index",
            'card_title' => PROFILE_PERSONS['card_title'],
            'list' => $list,
        ];

        //Hiển thị view
        $this->title = PROFILE_PERSONS['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function store()
    {
        $name = $_POST['name'];
        $currentTime = date('Y-m-d H:i:s');
        if ($this->receivePersonModel->insert([
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
        if ($this->receivePersonModel->delete(['id' => $id])) {
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
        $profileType = $this->receivePersonModel->find(['id' => $_GET['id']]);
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
        $profileType = $this->receivePersonModel->find(['id' => $id]);
        if ($profileType) {
            if ($this->receivePersonModel->update(['name' => $_POST['name']], ['id' => $id])) {
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
}
