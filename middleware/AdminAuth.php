<?php 
class AdminAuth
{
    public function __construct()
    {
        if (! Auth::check('auth-admin')) {
            redirect('admin/login');
        }
    }
}
