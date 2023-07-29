<?php
namespace Controllers;

use Helpers\Controller;
use Helpers\Validate;
use Helpers\Auth;
use Models\Users;

class Authentication extends Controller
{
    private Validate $validate;
    private Users $userModel;
    public $title;

    public function __construct()
    {
        $this->validate = new Validate();
        $this->userModel = new Users();
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

    public function handleChangePassword()
    {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if (!$this->checkCurrentPassword($currentPassword)) {
            $_SESSION['notification'] =  [
                'type' => 'error',
                'messager' => 'Mật khẩu hiện tại không chính xác'
            ];
            setOldValue([
                'current_password' => $currentPassword,
                'new_password' => $newPassword,
                'confirm_password' => $confirmPassword,
            ]);

            return redirect(route('admin.change_password'));
        }

        if (!$this->checkPasswordsMatch($confirmPassword, $newPassword)) {
            $_SESSION['notification'] =  [
                'type' => 'error',
                'messager' => 'Xác nhận mật khẩu không trùng khớp'
            ];
            setOldValue([
                'current_password' => $currentPassword,
                'new_password' => $newPassword,
                'confirm_password' => $confirmPassword,
            ]);

            return redirect(route('admin.change_password'));
        }

        if (!$this->userModel->update(['password' => md5($newPassword)], ['id' => Auth::user('auth-admin')['id']])) {
            $_SESSION['notification'] =  [
                'type' => 'error',
                'messager' => 'Thay đổi mật khẩu thất bại'
            ];
            setOldValue([
                'current_password' => $currentPassword,
                'new_password' => $newPassword,
                'confirm_password' => $confirmPassword,
            ]);
        } else {
            $_SESSION['notification'] =  [
                'type' => 'success',
                'messager' => 'Thay đổi mật khẩu thành công'
            ];
        }
       
        return redirect(route('admin.change_password'));
    }

    private function checkCurrentPassword($currentPassword)
    {
        return (! empty($this->userModel->find(['id' => Auth::user('auth-admin')['id'] ?? null, 'password' => md5($currentPassword)]))) ? true : false;
    }

    function checkPasswordsMatch($newPassword, $confirmPassword) {
        return $newPassword == $confirmPassword;
    }
    
}
