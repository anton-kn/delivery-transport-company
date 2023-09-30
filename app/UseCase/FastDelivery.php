<?php

namespace app\UseCase;

use app\Request;
use app\Service\Service;
use app\DataEntity\FastDelivery as Fast;
use DateTime;


/**
 * Быстрая доставка
 */
class FastDelivery
{
    public function handle(Request $request): string
    {
        $validate = $this->validate($request);
        if ($validate == false) {
            return json_encode(["Недостаточно данных для запроса"], JSON_UNESCAPED_UNICODE);
        }
        // после 18.00 заявки не принимаются
        if (date("H:i") > "18:00") {
            return json_encode(["«Быстрая доставка» - после 18.00 заявки не принимаются"], JSON_UNESCAPED_UNICODE);
        }
        $service = new Service();
        $list = $service->getInfo($request);

        //формируем данные на вывод
        $listFastDelivery = [];
        foreach ($list as $key => $item) {
            $fastDelivey = new Fast();
            $delivery = json_decode($item, true);

            // если нет даты
            if ($delivery['date']) {
                //количество дней период
                $date1 = DateTime::createFromFormat('Y-m-d', $delivery['date']);
                $date2 = DateTime::createFromFormat('Y-m-d', date("Y-m-d"));
                $difference =  date_diff($date1, $date2);
                $differenceDayCount = $difference->days;
            }

            $fastDelivey->setPeriod(isset($differenceDayCount) ? $differenceDayCount : null)
                ->setNameCompany($delivery['companyName'])
                ->setPrice($delivery['price'])
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
        if ($request->isRequest() && $request->sourceKladr() && $request->targetKladr() && $request->weight()) {
            return true;
        }

        return false;
    }
}
