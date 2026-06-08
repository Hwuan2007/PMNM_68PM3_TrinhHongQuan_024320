<?php
class SinhvienController{
    public function index(){
        echo "Hello from SinhvienController - index method!";
        // echo "Hello from SinhvienController - index method!";
        require_once '../app/views/sinhvien/index.php';
    }

    public function show($id){
        echo "Hello from SinhvienController - show method! ID: " . $id;
    }
    

    public function create(){
        // echo "Hello from SinhvienController - create method!";
        require_once '../app/views/sinhvien/create.php';
    }  
}
?>