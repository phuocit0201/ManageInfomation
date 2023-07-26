<?php
namespace Controllers;

use Helpers\Controller;
class Logout extends Controller
{
    public function logoutAdmin()
    {
        unset($_SESSION['auth-admin']);
        return redirect(route('admin.login'));
    }
}
