<?php
require_once '../app/core/Controller.php';
class LophocController extends Controller
{
    public function index($pageIndex = 1, $pageSize = 10, $search = '')
    {
        if (isset($_GET['pageIndex'])) {
            $pageIndex = max(1, (int)$_GET['pageIndex']);
        }
        if (isset($_GET['pageSize'])) {
            $pageSize = max(1, (int)$_GET['pageSize']);
        }
        if (isset($_GET['search'])) {
            $search = trim($_GET['search']);
        }

        $lophocModel = $this->model('lophocModel');
        $offset = ($pageIndex - 1) * $pageSize;
        $result = $lophocModel->getPagingLopHoc($pageSize, $offset, $search);
        $lophoc = $result['data'];
        $total = $result['total'];

        $this->view('layout/masterLayout', [
            'title' => 'Danh sách lớp học',
            'nameView' => 'lophoc/index',
            'lophoc' => $lophoc,
            'total' => $total,
            'pageIndex' => $pageIndex,
            'pageSize' => $pageSize,
            'search' => $search
        ]);
    }

    public function create()
    {
        $this->view('layout/masterLayout', [
            'title' => 'Tạo lớp học mới',
            'nameView' => 'lophoc/create'
        ]);
    }

    public function store()
    {
        $lophocModel = $this->model('lophocModel');
        $malop = $_POST['malop'] ?? '';
        $tenlop = $_POST['tenlop'] ?? '';
        $ghichu = $_POST['ghichu'] ?? '';
        $lophocModel->createLopHoc($malop, $tenlop, $ghichu);
        header('Location: ?url=lophoc/index');
        exit();
    }

    public function edit($id)
    {
        $lophocModel = $this->model('lophocModel');
        $lop = $lophocModel->getLopHocById($id);
        if (!$lop) {
            header('Location: ?url=lophoc/index');
            exit();
        }
        $this->view('layout/masterLayout', [
            'title' => 'Chỉnh sửa lớp học',
            'nameView' => 'lophoc/edit',
            'lophoc' => $lop
        ]);
    }

    public function update()
    {
        $lophocModel = $this->model('lophocModel');
        $id = $_POST['id'] ?? null;
        $malop = $_POST['malop'] ?? '';
        $tenlop = $_POST['tenlop'] ?? '';
        $ghichu = $_POST['ghichu'] ?? '';
        if ($id) {
            $lophocModel->updateLopHoc($id, $malop, $tenlop, $ghichu);
        }
        header('Location: ?url=lophoc/index');
        exit();
    }

    public function delete($id)
    {
        $lophocModel = $this->model('lophocModel');
        if ($id) {
            $lophocModel->deleteLopHoc($id);
        }
        header('Location: ?url=lophoc/index');
        exit();
    }
}
