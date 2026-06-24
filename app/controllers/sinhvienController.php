<?php
require_once '../app/core/Controller.php';
class SinhvienController extends Controller
{
    public function index($pageIndex = 1, $pageSize = 2, $search = '')
    {
        // Allow GET-parameter fallback so pagination/search works from view links
        if (isset($_GET['pageIndex'])) {
            $pageIndex = max(1, (int)$_GET['pageIndex']);
        }
        if (isset($_GET['pageSize'])) {
            $pageSize = max(1, (int)$_GET['pageSize']);
        }
        if (isset($_GET['search'])) {
            $search = trim($_GET['search']);
        }

        $sinhvienModel = $this->model('sinhvienModel');
        $offset = ($pageIndex - 1) * $pageSize;
        $result = $sinhvienModel->getPagingSinhVien($pageSize, $offset, $search);
        $sinhvien = $result['data'];
        $total = $result['total'];

        $this->view('layout/masterLayout', [
            'title' => 'Danh sách sinh viên',
            'nameView' => 'sinhvien/index',
            'sinhvien' => $sinhvien,
            'total' => $total,
            'pageIndex' => $pageIndex,
            'pageSize' => $pageSize,
            'search' => $search
        ]);
    }

    public function show($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $sv = $sinhvienModel->getSinhvienById($id);
        $this->view('layout/masterLayout', [
            'title' => 'Xem sinh viên',
            'nameView' => 'sinhvien/show',
            'sinhvien' => $sv
        ]);
    }

    public function edit($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $sv = $sinhvienModel->getSinhvienById($id);
        if (!$sv) {
            header('Location: ?url=sinhvien/index');
            exit();
        }
        $lophocModel = $this->model('lophocModel');
        $lophocList = $lophocModel->getAllLopHoc();
        $this->view('layout/masterLayout', [
            'title' => 'Chỉnh sửa sinh viên',
            'nameView' => 'sinhvien/edit',
            'sinhvien' => $sv,
            'lophocList' => $lophocList
        ]);
    }
    public function update()
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $id = $_POST['id'] ?? null;
        $MSSV = $_POST['MSSV'] ?? '';
        $HoTen = $_POST['HoTen'] ?? '';
        $GioiTinh = $_POST['GioiTinh'] ?? '';
        $MaLop = $_POST['malop'] ?? '';
        if ($id) {
            $sinhvienModel->updateSinhvien($id, $MSSV, $HoTen, $GioiTinh, $MaLop);
        }
        header('Location: ?url=sinhvien/index');
        exit();
    }
    public function delete($id)
    {
        $sinhvienModel = $this->model('sinhvienModel');
        if ($id) {
            $sinhvienModel->deleteSinhvien($id);
        }
        header('Location: ?url=sinhvien/index');
        exit();
    }
    public function create()
    {
        $lophocModel = $this->model('lophocModel');
        $lophocList = $lophocModel->getAllLopHoc();
        $this->view('layout/masterLayout', [
            'title' => 'Tạo sinh viên mới',
            'nameView' => 'sinhvien/create',
            'lophocList' => $lophocList
        ]);
    }

    public function store()
    {
        $sinhvienModel = $this->model('sinhvienModel');
        $MSSV = $_POST['MSSV'] ?? '';
        $HoTen = $_POST['HoTen'] ?? '';
        $GioiTinh = $_POST['GioiTinh'] ?? '';
        $MaLop = $_POST['malop'] ?? '';
        $sinhvienModel->createSinhvien($MSSV, $HoTen, $GioiTinh, $MaLop);
        header('Location: ?url=sinhvien/index');
    }
}
