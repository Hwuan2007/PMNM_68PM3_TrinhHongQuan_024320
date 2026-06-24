<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo lớp học mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="lophoc-container">
        <h1>Tạo lớp học mới</h1>
        <form class="form-lh" action="?url=lophoc/store" method="POST">
            <div class="form-row">
                <label for="malop">Mã lớp:</label>
                <input type="text" id="malop" name="malop" class="form-control">
            </div>
            <div class="form-row">
                <label for="tenlop">Tên lớp:</label>
                <input type="text" id="tenlop" name="tenlop" class="form-control">
            </div>
            <div class="form-row">
                <label for="ghichu">Ghi chú:</label>
                <textarea id="ghichu" name="ghichu" class="form-control"></textarea>
            </div>
            <div class="form-row" style="margin-top:8px;">
                <input type="submit" class="btn-primary-custom" value="Tạo">
                <a href="?url=lophoc/index" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>