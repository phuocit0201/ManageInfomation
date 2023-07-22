<?php 
class Guest
{
    public function __construct($gruad)
    {
        if (isset($_SESSION[$gruad])) {
            if ($gruad == 'auth-user') {
                header("location:" . base . "user/home");
                return;
            }
            header("location:" . base . "admin/home");
            return;
        }
    }
}
