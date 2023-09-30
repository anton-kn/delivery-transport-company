<?php

/**
 * Быстрая доставка
 */
require_once "conf/bootstrap.php";

use app\Request;
use app\Controller\DeliveryController;

$req = new Request();

$getInfo = new DeliveryController();
header('Content-Type: application/json; charset=utf-8');
echo $getInfo->fast($req->start());
