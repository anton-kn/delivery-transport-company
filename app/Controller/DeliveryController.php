<?php

namespace app\Controller;

use app\UseCase\SlowDelivery;
use app\Request;
use app\Service\Handler\TransportСompanyFactory;
use app\Service\Service;
use app\UseCase\FastDelivery;


/**
 * Доставка
 */
class DeliveryController
{

    /**
     * Быстрая доставка
     * @param Request $request
     * @return string
     */
    public function fast(Request $request): string
    {
        return (new FastDelivery())->handle($request);
    }


    /**
     * Медленная доставка
     * @param Request $request
     * @return string
     */
    public function slow(Request $request): string
    {
        return (new SlowDelivery())->handle($request);
    }
}
