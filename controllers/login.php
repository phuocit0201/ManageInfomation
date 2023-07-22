<?php
class login extends controller
{
    private Validate $validate;

    public function __construct()
    {
        $this->validate = new Validate();
    }

    public function admin()
    {
        new Guest('auth-admin');
        $this->view('admin/login');
    }

    public function authenticationAdmin()
    {
        new Guest('auth-admin');
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
            return redirect('login/admin');
        }
    }
}
