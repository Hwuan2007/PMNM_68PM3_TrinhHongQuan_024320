<div class="lophoc-container">
    <h1>Danh sách lớp học</h1>
    <div style="display:flex;justify-content:space-between;margin-bottom:12px;">
        <a href="?url=lophoc/create" class="btn-primary-custom">Tạo mới</a>
        <form method="GET" action="?url=lophoc/index" style="display:flex;gap:8px;align-items:center;">
            <input type="hidden" name="url" value="lophoc/index">
            <input type="text" name="search" placeholder="Tìm kiếm theo tên lớp..." value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
            <button type="submit" class="btn-outline">Tìm kiếm</button>
        </form>
    </div>
    <table>
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
                            <a href="?url=lophoc/edit/<?php echo urlencode($lop['id']); ?>" class="btn btn-sm btn-secondary">Sửa</a>
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
        <tfoot>
            <tr>
                <td colspan="5">
                    <div class="pagination-sv">
                        <?php
                        $totalRows = isset($total) ? (int)$total : 0;
                        $pageSize = isset($pageSize) && (int)$pageSize > 0 ? (int)$pageSize : 10;
                        $totalPages = max(1, (int)ceil($totalRows / $pageSize));
                        $current = isset($pageIndex) ? (int)$pageIndex : 1;
                        $searchParam = isset($search) ? $search : '';
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i === $current) {
                                echo "<span class='current'>" . $i . "</span> ";
                            } else {
                                $link = '?url=lophoc/index&pageIndex=' . $i . '&pageSize=' . $pageSize . '&search=' . urlencode($searchParam);
                                echo "<a href='" . $link . "'>" . $i . "</a> ";
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>