<?php
require_once '../app/core/Controller.php';
class HomeController extends Controller
{
    public function index()
    {
        $this->view('layout/masterLayout', [
            'title' => 'Trang chủ',
            'nameView' => 'home/index'
        ]);
    }

    public function about()
    {
        echo "Hello from HomeController - about method!";
    }
}
