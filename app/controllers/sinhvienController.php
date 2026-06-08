<?php
require_once '../app/core/Controller.php';
class SinhvienController extends Controller {
    public function index(){
        // require_once '../app/views/sinhvien/index.php';
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel -> getAllSinhvien();
        $this -> view('sinhvien/index', ['sinhvien' => $sinhvien]);
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