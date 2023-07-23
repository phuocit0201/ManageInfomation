<?php
class LoginAdmin extends controller
{
    private Validate $validate;

    public function __construct()
    {
        $this->validate = new Validate();
        new AdminGuest();
    }

    public function index()
    {
        $this->view('admin/login');
    }

    public function authentication()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (!$this->validate->validateLogin($username, $password)) {
                $_SESSION['message'] = VALIDATE_LOGIN;
                return redirect('login/admin');
            }

            if (Auth::attempt([
                'username' => $username,
                'password' => md5($password),
                'active' => ACTIVE_ACCOUNT['unbanned'],
            ], 'auth-admin')) {
                return redirect('admin');
            }
            $_SESSION['message'] = LOGIN_FAILD;
            return redirect('admin/login');
        }
    }
}
