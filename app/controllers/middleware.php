<?php
class Middleware {
    public static function isAuthenticated() {
        session_start();
        $publicPages = ['auth/login', 'auth/doLogin'];
        $currentPage = $_GET['url'] ?? 'home/index';
        if (!isset($_SESSION['username']) && !in_array($currentPage, $publicPages)) {
            header('Location: ?url=auth/login');
            exit();
        }
    }
}
?>