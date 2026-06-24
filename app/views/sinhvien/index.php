<?php
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} elseif (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $user = $_SESSION['username'];
} else {
    header('Location: ?url=auth/login');
    exit();
}
?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4">Danh sách sinh viên</h2>
        <div>
            <a href="?url=sinhvien/create" class="btn btn-primary">Tạo mới</a>
        </div>
    </div>
    <form class="row g-2 mb-3" method="GET" action="?url=sinhvien/index">
        <input type="hidden" name="url" value="sinhvien/index">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo họ tên..." value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>MSSV</th>
                    <th>Lớp</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($sinhvien) && is_array($sinhvien)): ?>
                    <?php foreach ($sinhvien as $sv): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($sv['id'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($sv['mssv'] ?? $sv['MSSV'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($sv['malop'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($sv['hoten'] ?? $sv['HoTen'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($sv['gioitinh'] ?? $sv['GioiTinh'] ?? ''); ?></td>
                            <td>
                                <a href="?url=sinhvien/edit/<?php echo urlencode($sv['id']); ?>" class="btn btn-sm btn-secondary me-1">Sửa</a>
                                <form action="?url=sinhvien/delete/<?php echo urlencode($sv['id']); ?>" method="POST" style="display:inline" onsubmit="return confirm('Bạn có chắc muốn xóa không?');">
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
            $totalRows = isset($total) ? (int)$total : 0;
            $pageSize = isset($pageSize) && (int)$pageSize > 0 ? (int)$pageSize : 10;
            $totalPages = max(1, (int)ceil($totalRows / $pageSize));
            $current = isset($pageIndex) ? (int)$pageIndex : 1;
            $searchParam = isset($search) ? $search : '';
            for ($i = 1; $i <= $totalPages; $i++) {
                $active = $i === $current ? 'active' : '';
                $link = '?url=sinhvien/index&pageIndex=' . $i . '&pageSize=' . $pageSize . '&search=' . urlencode($searchParam);
                echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . $link . '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>