<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="sinhvien-container">
        <h1>Chỉnh sửa sinh viên</h1>
        <?php if (!isset($sinhvien) || !$sinhvien): ?>
            <p>Không tìm thấy sinh viên.</p>
        <?php else: ?>
            <form class="form-sv" action="?url=sinhvien/update" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($sinhvien['id']); ?>">
                <div class="form-row">
                    <label for="MSSV">MSSV:</label>
                    <input type="text" id="MSSV" name="MSSV" value="<?php echo htmlspecialchars($sinhvien['mssv'] ?? $sinhvien['MSSV'] ?? ''); ?>" class="form-control">
                </div>
                <div class="form-row">
                    <label for="HoTen">Họ tên:</label>
                    <input type="text" id="HoTen" name="HoTen" value="<?php echo htmlspecialchars($sinhvien['hoten'] ?? $sinhvien['HoTen'] ?? ''); ?>" class="form-control">
                </div>
                <div class="form-row">
                    <label for="GioiTinh">Giới tính:</label>
                    <select id="GioiTinh" name="GioiTinh" class="form-control">
                        <?php $gv = $sinhvien['gioitinh'] ?? $sinhvien['GioiTinh'] ?? ''; ?>
                        <option value="Nam" <?php echo $gv == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?php echo $gv == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                        <option value="Khác" <?php echo $gv == 'Khác' ? 'selected' : ''; ?>>Khác</option>
                    </select>
                </div>
                <div class="form-row">
                    <input type="submit" class="btn-primary-custom" value="Cập nhật">
                    <a href="?url=sinhvien/index" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>