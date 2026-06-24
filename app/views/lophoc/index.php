<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4">Danh sách lớp học</h2>
        <a href="?url=lophoc/create" class="btn btn-primary">Tạo mới</a>
    </div>
    <form class="row g-2 mb-3" method="GET" action="?url=lophoc/index">
        <input type="hidden" name="url" value="lophoc/index">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên lớp..." value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Ghi chú</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($lophoc) && is_array($lophoc)): ?>
                    <?php foreach ($lophoc as $lop): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($lop['id'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($lop['malop'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($lop['tenlop'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($lop['ghichu'] ?? ''); ?></td>
                            <td>
                                <a href="?url=lophoc/edit/<?php echo urlencode($lop['id']); ?>" class="btn btn-sm btn-secondary me-1">Sửa</a>
                                <form action="?url=lophoc/delete/<?php echo urlencode($lop['id']); ?>" method="POST" style="display:inline" onsubmit="return confirm('Bạn có chắc muốn xóa không?');">
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
        </table>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
            $totalRows = isset($total) ? (int)$total : 0;
            $pageSize = isset($pageSize) && (int)$pageSize > 0 ? (int)$pageSize : 10;
            $totalPages = max(1, (int)ceil($totalRows / $pageSize));
            $current = isset($pageIndex) ? (int)$pageIndex : 1;
            $searchParam = isset($search) ? $search : '';
            for ($i = 1; $i <= $totalPages; $i++) {
                $active = $i === $current ? 'active' : '';
                $link = '?url=lophoc/index&pageIndex=' . $i . '&pageSize=' . $pageSize . '&search=' . urlencode($searchParam);
                echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . $link . '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>