<?php 
class AdminGuest
{
    public function __construct()
    {
        if (isset($_SESSION['auth-admin'])) {
            redirect('admin');
        }
    }
}
