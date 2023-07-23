<?php 
class AdminAuth
{
    public function __construct()
    {
        if (! Auth::check('auth-admin')) {
            return redirect('admin/login');
        }
    }
}
