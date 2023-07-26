<?php
namespace Middleware;

class AdminGuest
{
    public function __construct()
    {
        if (isset($_SESSION['auth-admin'])) {
            redirect(route('admin.home'));
        }
    }
}
