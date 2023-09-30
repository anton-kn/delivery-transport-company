<?php

namespace app\Service\Handler;

use app\Request;
use app\Service\Handler\SdekСompany;
use app\Service\Handler\TransportСompany;


/**
 * Фабрика ТК
 */
class TransportСompanyFactory
{
    /**
     * ТК Почта
     * @param Request $request
     * @return TransportСompany
     */
    public static function pochta(Request $request): TransportСompany
    {
        return new PochtaСompany($request);
    }

    /**
     * ТК СДЭК
     * @param Request $request
     * @return TransportСompany
     */
    public static function sdek(Request $request): TransportСompany
    {
        return new SdekСompany($request);
    }
}
