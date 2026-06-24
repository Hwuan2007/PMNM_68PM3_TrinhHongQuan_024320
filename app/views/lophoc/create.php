<div class="container py-4">
    <h2 class="h5 mb-3">Tạo lớp học mới</h2>
    <form action="?url=lophoc/store" method="POST" class="row g-3">
        <div class="col-md-4">
            <label for="malop" class="form-label">Mã lớp</label>
            <input type="text" id="malop" name="malop" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="tenlop" class="form-label">Tên lớp</label>
            <input type="text" id="tenlop" name="tenlop" class="form-control">
        </div>
        <div class="col-12">
            <label for="ghichu" class="form-label">Ghi chú</label>
            <textarea id="ghichu" name="ghichu" class="form-control"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tạo</button>
            <a href="?url=lophoc/index" class="btn btn-secondary ms-2">Hủy</a>
        </div>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>