<?php
namespace Helpers;

use Models\Users;
class Auth
{
    public static function user($guard = 'auth-user')
    {
        $userModel = new Users();
        return $userModel->find(['id' => $_SESSION[$guard]]);
    }

    public static function check($guard = 'auth-user')
    {
        if (isset($_SESSION[$guard])) {
            $userModel = new Users();
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

    public static function attempt($array = [], $guard = 'auth-user')
    {
        $userModel = new Users();
        $user = $userModel->find($array);

        if (empty($user)) {
            return false;
        }

        $_SESSION[$guard] = $user['id'];
        return true;
    }
}
