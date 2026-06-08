<?php
require_once '../app/core/Controller.php';
class SinhvienController extends Controller {
    public function index(){
        // require_once '../app/views/sinhvien/index.php';
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel -> getAllSinhvien();
         // $this -> view('sinhvien/index', ['sinhvien' => $sinhvien]);
        $this -> view('layout/masterLayout', [
            'title' => 'Danh sách sinh viên',
            // 'viewName' => 'sinhvien/index',
            'nameView' => 'sinhvien/index',
            'sinhvien' => $sinhvien
        ]);
    }

    public function show($id){
        echo "Hello from SinhvienController - show method! ID: " . $id;
    }
    

    public function create(){
        // echo "Hello from SinhvienController - create method!";
        $this -> view('layout/masterLayout', [
            'title' => 'Tạo sinh viên mới',
            'nameView' => 'sinhvien/create'
        ]);
    }  

    public function store(){
        $sinhvienModel = $this -> model('sinhvienModel');
        $MSSV = $_POST['MSSV'] ?? '';
        $HoTen = $_POST['HoTen'] ?? '';
        $GioiTinh = $_POST['GioiTinh'] ?? '';
        $sinhvienModel -> createSinhvien($MSSV, $HoTen, $GioiTinh);
        header('Location: ?url=sinhvien/index');
    }
}
?>