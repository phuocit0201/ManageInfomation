<?php

namespace Controllers;

use Helpers\Controller;
use Models\Invoice as InvoiceModel;
use Models\Organization as ModelsOrganization;
use Models\Branch as BranchModel;
use Models\ReceivePerson as ReceivePersonModel;

class Invoice extends Controller
{
    public $title;
    private InvoiceModel $InvoiceModel;
    private ModelsOrganization $organizationModel;
    private BranchModel $branchModel;
    private $receivePersonModel;

    public function __construct()
    {
        $this->InvoiceModel = new InvoiceModel();
        $this->organizationModel = new ModelsOrganization();
        $this->branchModel = new BranchModel();
        $this->receivePersonModel = new ReceivePersonModel();
        
    }

    public function index()
    {
        $list = $this->InvoiceModel->getInvoiceAll(['created_at', 'desc']);
        $data = [
            'page' => "admin/invoice/index",
            'card_title' => INVOICE['card_title'],
            'list' => $list
        ];

        //Hiển thị view
        $this->title = INVOICE['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function create()
    {
        $organizations = $this->organizationModel->all(['id', 'desc']);
        $branches = $this->branchModel->all(['id', 'desc']);
        $receivePersons = $this->receivePersonModel->all(['id', 'desc']);
        $data = [
            'page' => "admin/invoice/create",
            'card_title' => INVOICE['card_title'],
            'organizations' => $organizations,
            'branches' => $branches,
            'receivePersons' => $receivePersons
        ];
        // Hiển thị view
        $this->title = INVOICE['title'];
        $this->view('admin/masterlayout', $data);
    }

    public function store()
{
    $dataForm = $_POST['data'];
    $timestamp = strtotime(date('Y-m-d H:i:s'));
    $dataForm['id'] = (int) $timestamp;
    $dataForm['created_at'] = date('Y-m-d H:i:s');

    if ($this->InvoiceModel->insert($dataForm)) {
        return redirect(route('admin.invoice_print') . '?id=' . $dataForm['id']);
    } 

    $_SESSION['notification'] = [
        'type' => 'error',
        'messager' => CREATE_ITEM_FAILED
    ];
    return redirect(route('admin.invoice'));
}


public function delete()
{
    $id = $_POST['id'];
    if ($this->InvoiceModel->delete(['id' => $id])) {
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

    return redirect(route('admin.invoice'));
}

public function show()
{
    $organizations = $this->organizationModel->all(['id', 'desc']);
    $branches = $this->branchModel->all(['id', 'desc']);
    $receivePersons = $this->receivePersonModel->all(['id', 'desc']);
    
    if (!isset($_GET['id'])) {
        return redirect(route('admin.invoice'));
    }
    $invoice = $this->InvoiceModel->getInvoiceById($_GET['id']);
    $data = [
        'page' => "admin/invoice/show",
        'card_title' => INVOICE['card_title'],
        'organizations' => $organizations,
        'branches' => $branches,
        'receivePersons' => $receivePersons,
        'invoice' => $invoice
    ];
    // Hiển thị view
    $this->title = INVOICE['title'];
    $this->view('admin/masterlayout', $data);
    
}


public function edit()
{
    $organizations = $this->organizationModel->all(['id', 'desc']);
    $branches = $this->branchModel->all(['id', 'desc']);
    $receivePersons = $this->receivePersonModel->all(['id', 'desc']);
    if (!isset($_GET['id'])) {
        return redirect(route('admin.invoice'));
    }
    $invoice = $this->InvoiceModel->getInvoiceById($_GET['id']);
    $data = [
        'page' => "admin/invoice/edit",
        'card_title' => INVOICE['card_title'],
        'organizations' => $organizations,
        'branches' => $branches,
        'receivePersons' => $receivePersons,
        'invoice' => $invoice
    ];
    $this->title = INVOICE['title'];
    $this->view('admin/masterlayout', $data);
}

public function update()
{
    $dataUpdate = $_POST['data'];
    //lấy id cần update (làm điều kiện update)
    $id = $dataUpdate['id'];
    //bỏ id ra khỏi dữ liệu update
    unset($dataUpdate['id']);
    //tìm kiếm invoice xem có tồn không
    if (empty($this->InvoiceModel->find(['id' => $id]))) {
        return redirect(route('admin.invoice'));
    }
    // Nếu chỉnh sửa thất bại thì vào đây
    if (!$this->InvoiceModel->update($dataUpdate, ['id' => $id])) {
        $_SESSION['notification'] = [
            'type' => 'error',
            'message' => 'Update failed.' // Change this message as needed
        ];
        return redirect(route('admin.invoice'));
    }

    return redirect(route('admin.invoice_print') . '?id=' . $id);
}

public function printInvoice()
{
    if (!isset($_GET['id'])) {
        return redirect(route('admin.invoice'));
    }
    
    $invoice = $this->InvoiceModel->getInvoiceById($_GET['id']);
    
    // Chuyển định dạng thời gian created_at
    $invoice['created_at'] = date('\N\g\à\y d \t\h\á\n\g m \n\ă\m Y', strtotime($invoice['created_at']));

    // Truyền dữ liệu vào view
    return $this->view('admin/invoice/print', ['invoice' => $invoice]);
}




}