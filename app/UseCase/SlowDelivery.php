<?php

namespace app\UseCase;

use app\Request;
use app\Service\Service;
use app\DataEntity\SlowDelivery as Slow;
use DateTime;


/**
 * Быстрая доставка
 */
class SlowDelivery
{
    /**
     * Базовая стоимость 150р
     */
    private const BASE_PRICE = 150;

    /**
     * Быстрая доставка
     * @param Request $request
     * @return string
     */
    public function handle(Request $request): string
    {
        $validate = $this->validate($request);
        if ($validate == false) {
            return json_encode(["Недостаточно данных для запроса"], JSON_UNESCAPED_UNICODE);
        }

        // вызываем сервис для получения данных от ТК
        $service = new Service();
        $list = $service->getInfo($request);

        // список всех данных от ТК
        $listFastDelivery = [];
        //формируем данные на вывод
        foreach ($list as $key => $item) {
            $fastDelivey = new Slow();
            $delivery = json_decode($item, true);

            $fastDelivey->setDate($delivery['date'])
                ->setCoefficient(isset($delivery['price']) ? $delivery['price'] + self::BASE_PRICE : null)
                ->setNameCompany($delivery['companyName'])
                ->setError($delivery['error']);
            $listFastDelivery[] = $fastDelivey->getArray();
        }

        return json_encode($listFastDelivery, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Валидация входных данных
     * @param Request $request
     * @return boolean
     */
    private function validate(Request $request): bool
    {
        if ($request->isRequest() &&  $request->sourceKladr() && $request->targetKladr() && $request->weight()) {
            return true;
        }

        return false;
    }
}
