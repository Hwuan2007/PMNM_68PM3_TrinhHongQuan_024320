<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Default Title'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php if (isset($nameView) && strpos($nameView, 'sinhvien/') === 0): ?>
        <?php $publicBase = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'); ?>
        <link rel="stylesheet" href="<?php echo $publicBase; ?>/css/sinhvien.css">
    <?php endif; ?>
</head>
<style>
    .content {
        min-height: 400px;
        padding: 20px;
    }
</style>

<body>
    <?php require_once '../app/views/layout/header.php'; ?>
    <div class="content">
        <?php
        $nameView = isset($nameView) ? $nameView : 'home';
        require_once '../app/views/' . $nameView . '.php';
        ?>
    </div>
    <?php require_once '../app/views/layout/footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>