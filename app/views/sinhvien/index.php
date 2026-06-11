<!-- <!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<<body> -->
<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "Xin chào(SS), " . $_SESSION['username'] . "! <a href='?url=auth/logout'>Đăng xuất</a>";
} elseif (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    echo "Xin chào(CK), " . $_SESSION['username'] . "! <a href='?url=auth/logout'>Đăng xuất</a>";
} else {
    header('Location: ?url=auth/login');
    exit();
}
?>
<!-- table style -->
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        text-align: left;
    }

    .btn-primary-custom {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-primary-custom:hover {
        background-color: #0056b3;
    }

    .sinhvien-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .sinhvien-controls {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .pagination-sv {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .pagination-sv a {
        padding: 6px 12px;
        border: 1px solid #ddd;
        text-decoration: none;
        color: #007bff;
    }

    .pagination-sv a:hover {
        background-color: #f2f2f2;
    }

    .pagination-sv .current {
        padding: 6px 12px;
        border: 1px solid #007bff;
        background-color: #007bff;
        color: white;
    }
</style>
<div class="sinhvien-container">
    <h1>Danh sách sinh viên</h1>
    <div class="sinhvien-controls">
        <div class="left">
            <a href="?url=sinhvien/create" class="btn-primary-custom">Tạo mới</a>
        </div>
        <div class="right">
            <form method="GET" action="?url=sinhvien/index" style="display:flex;gap:8px;align-items:center;">
                <input type="hidden" name="url" value="sinhvien/index">
                <input type="text" name="search" placeholder="Tìm kiếm theo họ tên..." value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
                <button type="submit" class="btn-outline">Tìm kiếm</button>
            </form>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>MSSV</th>
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
                        <td><?php echo htmlspecialchars($sv['hoten'] ?? $sv['HoTen'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($sv['gioitinh'] ?? $sv['GioiTinh'] ?? ''); ?></td>
                        <td>
                            <a href="?url=sinhvien/edit/<?php echo urlencode($sv['id']); ?>" class="btn btn-sm btn-secondary">Sửa</a>
                            <form action="?url=sinhvien/delete/<?php echo urlencode($sv['id']); ?>" method="POST" style="display:inline" onsubmit="return confirm('Bạn có chắc muốn xóa không?');">
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    <div class="pagination-sv">
                        <?php
                        $totalRows = isset($total) ? (int)$total : 0;
                        $pageSize = isset($pageSize) && (int)$pageSize > 0 ? (int)$pageSize : 10;
                        $totalPages = max(1, (int)ceil($totalRows / $pageSize));
                        $current = isset($pageIndex) ? (int)$pageIndex : 1;
                        $searchParam = isset($search) ? $search : '';
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i === $current) {
                                echo "<span class='current'>" . $i . "</span> ";
                            } else {
                                $link = '?url=sinhvien/index&pageIndex=' . $i . '&pageSize=' . $pageSize . '&search=' . urlencode($searchParam);
                                echo "<a href='" . $link . "'>" . $i . "</a> ";
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>