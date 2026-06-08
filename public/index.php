
<?php
require_once '../app/core/App.php';
require_once '../app/middleware.php';
$middleware = new Middleware();
$middleware->isAuthenticated();
$app = new App();

?>