<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo sinh viên mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    form {
        max-width: 400px;
        margin: 0 auto;
    }
    label {
        font-weight: bold;
    }
    input[type="text"], select {
        width: 100%;
        padding: 8px;
        margin: 5px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }</style>
<body>
    <h1>Tạo sinh viên mới</h1>
    <form action="?url=sinhvien/store" method="POST">
        <label for="MSSV">MSSV:</label><br>
        <input type="text" id="MSSV" name="MSSV"><br>
        <label for="HoTen">Họ tên:</label><br>
        <input type="text" id="HoTen" name="HoTen"><br>
        <label for="GioiTinh">Giới tính:</label><br>
        <select id="GioiTinh" name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
            <option value="Khác">Khác</option>
        </select><br><br>
        <input type="submit" value="Tạo">
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>