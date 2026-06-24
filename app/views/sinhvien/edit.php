<div class="container py-4">
    <h2 class="h5 mb-3">Chỉnh sửa sinh viên</h2>
    <?php if (!isset($sinhvien) || !$sinhvien): ?>
        <div class="alert alert-warning">Không tìm thấy sinh viên.</div>
    <?php else: ?>
        <form action="?url=sinhvien/update" method="POST" class="row g-3">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($sinhvien['id']); ?>">
            <div class="col-md-4">
                <label for="MSSV" class="form-label">MSSV</label>
                <input type="text" id="MSSV" name="MSSV" value="<?php echo htmlspecialchars($sinhvien['mssv'] ?? $sinhvien['MSSV'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="malop" class="form-label">Mã lớp</label>
                <select id="malop" name="malop" class="form-select">
                    <option value="">-- Chọn lớp --</option>
                    <?php if (isset($lophocList) && is_array($lophocList)): ?>
                        <?php foreach ($lophocList as $lop): ?>
                            <?php $val = $lop['malop'] ?? '';
                            $label = $lop['tenlop'] ?? $lop['malop'] ?? '';
                            $selected = ($sinhvien['malop'] ?? '') == $val ? 'selected' : ''; ?>
                            <option value="<?php echo htmlspecialchars($val); ?>" <?php echo $selected; ?>><?php echo htmlspecialchars($label); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="HoTen" class="form-label">Họ tên</label>
                <input type="text" id="HoTen" name="HoTen" value="<?php echo htmlspecialchars($sinhvien['hoten'] ?? $sinhvien['HoTen'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="GioiTinh" class="form-label">Giới tính</label>
                <?php $gv = $sinhvien['gioitinh'] ?? $sinhvien['GioiTinh'] ?? ''; ?>
                <select id="GioiTinh" name="GioiTinh" class="form-select">
                    <option value="Nam" <?php echo $gv == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo $gv == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                    <option value="Khác" <?php echo $gv == 'Khác' ? 'selected' : ''; ?>>Khác</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="?url=sinhvien/index" class="btn btn-secondary ms-2">Hủy</a>
            </div>
        </form>
    <?php endif; ?>
</div>