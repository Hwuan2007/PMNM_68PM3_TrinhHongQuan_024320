<?php
$user = $_SESSION['username'] ?? ($_COOKIE['username'] ?? null);
?>
<div class="header">
    <nav style="background:#f8f9fa; padding:14px 0; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
        <div style="max-width:900px; margin:0 auto; padding:0 24px;
                    display:flex; justify-content:space-between; align-items:center;">
            <a style="font-weight:700; font-size:20px; text-decoration:none; color:#1a1a2e; letter-spacing:0.5px;"
                href="?url=home/index">My App</a>
            <?php if ($user): ?>
                <div style="display:flex; align-items:center; gap:16px;">
                    <span style="font-size:14px; color:#555; line-height:1;">
                        👤 <strong style="color:#333;"><?php echo htmlspecialchars($user); ?></strong>
                    </span>
                    <a href="?url=auth/logout"
                        style="background:#dc3545; color:white; padding:7px 16px; border-radius:6px;
                          text-decoration:none; font-size:13px; font-weight:600; line-height:1;">
                        Đăng xuất
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</div>