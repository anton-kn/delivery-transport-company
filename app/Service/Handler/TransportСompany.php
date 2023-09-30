<?php

namespace app\Service\Handler;

/**
 * Транспортная компания
 */
interface TransportСompany
{
    /**
     * Информация о доставке
     */
    public function getDeliveryInformation(): string;
}
