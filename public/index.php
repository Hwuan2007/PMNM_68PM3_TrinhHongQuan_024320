
<?php
require_once '../app/core/App.php';
require_once '../app/controllers/middleware.php';
$middleware = new Middleware();
$middleware->isAuthenticated();
$app = new App();

?>