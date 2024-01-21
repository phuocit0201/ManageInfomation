<?php
namespace Controllers;

use Helpers\Controller;
use Models\Certificate as CertificateModel;
use Models\ReturnProfile as ReturnProfileModel;
class Certificate extends Controller
{
    public $title;

    private CertificateModel $certificateModel;
    private ReturnProfileModel $ReturnProfileModel;

    public function __construct()
    {
        $this->certificateModel = new CertificateModel();
        $this->ReturnProfileModel = new ReturnProfileModel();
    }
    
    public function index()
    {
        $list = $this->certificateModel->all(['id', 'desc']);

        $data = [
            'page' => "admin/certificate/index",
            'card_title' => CERTIFICATE['card_title'],
            'list' => $list,
        ];

        //Hiển thị view
        $this->title = CERTIFICATE['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function store()
    {
        $name = $_POST['name'];
        $currentTime = date('Y-m-d H:i:s');
        $certificate = $this->certificateModel->insert(
            [
                'name' => $name,
                'created_at' => $currentTime,
            ]
        );
        if ($certificate) {
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

        return redirect(route('admin.certificate'));
    }

    public function delete()
    {
        $id = $_POST['id'];
        $profileType = $this->certificateModel->find(['id' => $id]);
        if(empty($profileType)) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'messager' => DELETE_ITEM_FAILED
            ];
            return redirect(route('admin.certificate'));
        }
        if (!$this->ReturnProfileModel->delete(['id_cetificate' => $id])) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'messager' => DELETE_ITEM_FAILED
            ];
            return redirect(route('admin.certificate'));
        }
        if ($this->certificateModel->delete(['id' => $id])) {
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

        return redirect(route('admin.certificate'));
    }

    public function show()
    {
        $profileType = $this->certificateModel->find(['id' => $_GET['id']]);
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
        $profileType = $this->certificateModel->find(['id' => $id]);
        if ($profileType) {
            if ($this->certificateModel->update(['name' => $_POST['name']], ['id' => $id])) {
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

        return redirect(route('admin.certificate'));
    }
}
