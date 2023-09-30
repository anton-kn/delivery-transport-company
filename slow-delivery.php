<?php

/**
 * Медленная доставка
 */
require_once "conf/bootstrap.php";

use app\Request;
use app\Controller\DeliveryController;

header('Content-Type: application/json; charset=utf-8');
echo (new DeliveryController())->slow((new Request())->start());
