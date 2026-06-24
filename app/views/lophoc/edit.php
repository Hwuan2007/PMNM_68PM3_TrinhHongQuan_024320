<div class="container py-4">
    <h2 class="h5 mb-3">Chỉnh sửa lớp học</h2>
    <?php if (!isset($lophoc) || !$lophoc): ?>
        <div class="alert alert-warning">Không tìm thấy lớp học.</div>
    <?php else: ?>
        <form action="?url=lophoc/update" method="POST" class="row g-3">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($lophoc['id']); ?>">
            <div class="col-md-4">
                <label for="malop" class="form-label">Mã lớp</label>
                <input type="text" id="malop" name="malop" value="<?php echo htmlspecialchars($lophoc['malop'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="tenlop" class="form-label">Tên lớp</label>
                <input type="text" id="tenlop" name="tenlop" value="<?php echo htmlspecialchars($lophoc['tenlop'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-12">
                <label for="ghichu" class="form-label">Ghi chú</label>
                <textarea id="ghichu" name="ghichu" class="form-control"><?php echo htmlspecialchars($lophoc['ghichu'] ?? ''); ?></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="?url=lophoc/index" class="btn btn-secondary ms-2">Hủy</a>
            </div>
        </form>
    <?php endif; ?>
</div>