<div class="container py-4">
    <h2 class="h5 mb-3">Tạo sinh viên mới</h2>
    <form action="?url=sinhvien/store" method="POST" class="row g-3">
        <div class="col-md-4">
            <label for="MSSV" class="form-label">MSSV</label>
            <input type="text" id="MSSV" name="MSSV" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="malop" class="form-label">Mã lớp</label>
            <select id="malop" name="malop" class="form-select">
                <option value="">-- Chọn lớp --</option>
                <?php if (isset($lophocList) && is_array($lophocList)): ?>
                    <?php foreach ($lophocList as $lop): ?>
                        <option value="<?php echo htmlspecialchars($lop['malop'] ?? ''); ?>"><?php echo htmlspecialchars($lop['tenlop'] ?? $lop['malop'] ?? ''); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="HoTen" class="form-label">Họ tên</label>
            <input type="text" id="HoTen" name="HoTen" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="GioiTinh" class="form-label">Giới tính</label>
            <select id="GioiTinh" name="GioiTinh" class="form-select">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tạo</button>
            <a href="?url=sinhvien/index" class="btn btn-secondary ms-2">Hủy</a>
        </div>
    </form>
</div>