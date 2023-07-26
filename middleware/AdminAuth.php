<?php
namespace Middleware;
use Helpers\Auth;

class AdminAuth
{
    public function __construct()
    {
        if (! Auth::check('auth-admin')) {
            redirect(route('admin.login'));
        }

    }
}
