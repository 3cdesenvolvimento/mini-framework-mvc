<?php

require_once('../vendor/autoload.php');
require_once('../app/config/config.php');

use app\controllers\BaseController;

echo "<pre>";
print_r($routers);
echo "</pre>";

$app = new BaseController();