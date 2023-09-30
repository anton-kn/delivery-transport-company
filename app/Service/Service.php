<?php

namespace app\Service;

use app\Request;
use app\Service\Handler\PoshtaService;
use app\Service\Handler\TransportСompanyFactory;

/**
 * Сервис
 */
class Service
{

    /**
     * Запуск сервиса
     * @param Request $request
     * @return array
     */
    public function getInfo(Request $request): array
    {
        // фабрика
        $pochta = TransportСompanyFactory::pochta($request);
        $pochtaRes = $pochta->getDeliveryInformation();

        $sdek = TransportСompanyFactory::sdek($request);
        $sdekRes = $sdek->getDeliveryInformation();

        return [
            $pochtaRes,
            $sdekRes
        ];
    }
}
