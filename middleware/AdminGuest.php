<?php 
class AdminGuest
{
    public function __construct()
    {
        if (isset($_SESSION['auth-admin'])) {
            return redirect('admin');
        }
    }
}
