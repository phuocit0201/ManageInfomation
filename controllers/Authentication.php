<?php
namespace Controllers;

use Helpers\Controller;
use Helpers\Validate;
use Helpers\Auth;

class Authentication extends Controller
{
    private Validate $validate;
    public $title;

    public function __construct()
    {
        $this->validate = new Validate();
    }

    public function index()
    {
        $this->view('admin/authentication/login');
    }

    public function authentication()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!$this->validate->validateLogin($username, $password)) {
            $_SESSION['message'] = VALIDATE_LOGIN;
            return redirect('admin.login');
        }

        if (Auth::attempt([
            'username' => $username,
            'password' => md5($password),
            'active' => ACTIVE_ACCOUNT['unbanned'],
        ], 'auth-admin')) {
            return redirect(route('admin.home'));
        }
        $_SESSION['message'] = LOGIN_FAILD;

        return redirect(route('admin.login'));
    }

    public function logout()
    {
        unset($_SESSION['auth-admin']);
        return redirect(route('admin.login'));
    }

    public function changePassword()
    {
        $data = [
            'page' => "admin/authentication/change-password",
            'card_title' => 'Đổi Mật Khẩu',
        ];

        $this->title = 'Đổi Mật Khẩu';
        $this->view('admin/masterlayout', $data);
    }
    
}
