<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa lớp học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="lophoc-container">
        <h1>Chỉnh sửa lớp học</h1>
        <?php if (!isset($lophoc) || !$lophoc): ?>
            <p>Không tìm thấy lớp học.</p>
        <?php else: ?>
            <form class="form-lh" action="?url=lophoc/update" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($lophoc['id']); ?>">
                <div class="form-row">
                    <label for="malop">Mã lớp:</label>
                    <input type="text" id="malop" name="malop" value="<?php echo htmlspecialchars($lophoc['malop'] ?? ''); ?>" class="form-control">
                </div>
                <div class="form-row">
                    <label for="tenlop">Tên lớp:</label>
                    <input type="text" id="tenlop" name="tenlop" value="<?php echo htmlspecialchars($lophoc['tenlop'] ?? ''); ?>" class="form-control">
                </div>
                <div class="form-row">
                    <label for="ghichu">Ghi chú:</label>
                    <textarea id="ghichu" name="ghichu" class="form-control"><?php echo htmlspecialchars($lophoc['ghichu'] ?? ''); ?></textarea>
                </div>
                <div class="form-row" style="margin-top:8px;">
                    <input type="submit" class="btn-primary-custom" value="Cập nhật">
                    <a href="?url=lophoc/index" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>