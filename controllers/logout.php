<?php
    class logout extends controller
    {
        public function __construct()
        {
            new AdminAuth();
        }
        
        public function logoutAdmin()
        {
            unset($_SESSION['auth-admin']);
            return redirect('login/admin');
        }
    }
?>