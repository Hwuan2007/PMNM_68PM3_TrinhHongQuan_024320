<?php
class Middleware
{
    public static function isAuthenticated()
    {
        session_start();
        $publicPages = ['auth/login', 'auth/doLogin'];
        $currentPage = $_GET['url'] ?? 'home/index';
        if (!isset($_SESSION['username']) && !in_array($currentPage, $publicPages)) {
            header('Location: /PMNM_68PM3_TrinhHongQuan_024320/public/?url=auth/login');
            exit();
        }
    }
}
