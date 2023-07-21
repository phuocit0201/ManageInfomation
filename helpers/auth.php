<?php 
require_once './helpers/controller.php';
class Auth extends controller
{
    public static function user($guard = 'auth-user')
    {
        $userModel = controller::model('users');
        return $userModel->find(['id' => $_SESSION[$guard]]);
    }

    public static function check($guard = 'auth-user')
    {
        if (isset($_SESSION[$guard])) {
            $userModel = controller::model('users');
            $user =  $userModel->find([
                'id' => $_SESSION[$guard], 
                'active' => ACTIVE_ACCOUNT['unbanned'],
            ]);
            if (empty($user)) {
                unset($_SESSION[$guard]);
                return false;
            }
            return true;
        }

        return false;
    }

    public static function attempt($array = [], $guard = 'auth-user') {
        $userModel = controller::model('users');
        $user = $userModel->find($array);

        if (empty($user)) {
            return false;
        }

        $_SESSION[$guard] = $user['id'];
        return true;
    }
}
?>