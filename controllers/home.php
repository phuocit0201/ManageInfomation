<?php
    class home extends controller
    {
        public function __construct()
        {
            
        }

        public function home()
        {
            return redirect('login/admin');
        }

    }
?>