<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo sinh viên mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0d6efd;
            --accent: #6366f1;
            --muted: #6c757d;
            --bg: #f8fafc;
            --card-bg: #ffffff;
        }

        body {
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: var(--bg);
            color: #111827;
        }

        .sinhvien-container {
            max-width: 1100px;
            margin: 28px auto;
            background: var(--card-bg);
            padding: 20px 24px;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(2, 6, 23, 0.08);
        }

        .sinhvien-container h1 {
            color: var(--primary);
            font-size: 26px;
            margin-bottom: 14px;
        }

        .sinhvien-controls {
            display: flex;
            gap: 12px;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .sinhvien-controls .left {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .sinhvien-controls input[type="text"],
        .sinhvien-container input[type="text"],
        .sinhvien-container select,
        .sinhvien-container textarea {
            padding: 8px 10px;
            border: 1px solid #e6e9ef;
            border-radius: 8px;
            outline: none;
            transition: box-shadow .15s, border-color .15s;
        }

        .sinhvien-controls input[type="text"]:focus,
        .sinhvien-container input[type="text"]:focus {
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.08);
            border-color: var(--primary);
        }

        .table-sv {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
        }

        .table-sv thead th {
            background: linear-gradient(90deg, #eef2ff, #f8fafc);
            text-align: left;
            padding: 12px 14px;
            font-weight: 600;
            color: #0f172a;
            border-bottom: 1px solid #eef2f6;
        }

        .table-sv tbody td {
            padding: 12px 14px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-sv tbody tr:nth-child(even) {
            background: #fbfdff;
        }

        .table-sv tbody tr:hover {
            background: #f4f6ff;
        }

        .actions .btn {
            margin-right: 6px;
        }

        .btn-primary-custom {
            background: var(--primary);
            color: #fff;
            border-radius: 8px;
            padding: 8px 12px;
            border: none;
            text-decoration: none;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #e6e9ef;
            color: var(--muted);
            padding: 8px 10px;
            border-radius: 8px;
        }

        .form-sv {
            max-width: 640px;
        }

        .form-sv label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form-sv .form-row {
            margin-bottom: 12px;
        }

        .pagination-sv {
            display: flex;
            gap: 6px;
            justify-content: center;
            margin-top: 16px;
        }

        .pagination-sv a,
        .pagination-sv span {
            padding: 8px 10px;
            border-radius: 8px;
            border: 1px solid #e6e9ef;
            color: #0f172a;
            text-decoration: none;
        }

        .pagination-sv a:hover {
            background: #f1f5f9;
        }

        .pagination-sv .current {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        @media (max-width:680px) {
            .sinhvien-controls {
                flex-direction: column;
                align-items: stretch
            }

            .sinhvien-controls .left {
                width: 100%;
                justify-content: space-between
            }

            .table-sv thead {
                display: none
            }

            .table-sv tbody td {
                display: block;
                width: 100%;
            }

            .table-sv tbody tr {
                margin-bottom: 10px;
                display: block;
                border-radius: 8px;
                background: #fff;
                box-shadow: 0 2px 6px rgba(2, 6, 23, 0.04);
            }
        }
    </style>
</head>

<body>
    <div class="sinhvien-container">
        <h1>Tạo sinh viên mới</h1>
        <form class="form-sv" action="?url=sinhvien/store" method="POST">
            <div class="form-row">
                <label for="MSSV">MSSV:</label>
                <input type="text" id="MSSV" name="MSSV" class="form-control">
            </div>
            <div class="form-row">
                <label for="HoTen">Họ tên:</label>
                <input type="text" id="HoTen" name="HoTen" class="form-control">
            </div>
            <div class="form-row">
                <label for="GioiTinh">Giới tính:</label>
                <select id="GioiTinh" name="GioiTinh" class="form-control">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="form-row">
                <input type="submit" class="btn-primary-custom" value="Tạo">
                <a href="?url=sinhvien/index" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>