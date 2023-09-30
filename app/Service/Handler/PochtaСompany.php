<?php

namespace app\Service\Handler;

use app\Request;
use app\Service\Handler\Faker;


/**
 * ТК Почта
 */
class PochtaСompany implements TransportСompany
{
    /**
     * Коэффициент для расчета стоимости доствки
     */
    private const RATE = 0.1;

    /**
     * Данные запроса
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Получаем информацию от ТК
     * @return string
     */
    public function getDeliveryInformation(): string
    {
        foreach ($this->faker() as $route) {
            if ($route->sourceKladr == $this->request->sourceKladr() && $route->targetKladr == $this->request->targetKladr()) {
                $route->price = (float) $route->price * (float) $this->request->weight() * (float) self::RATE;

                return $route->getJson();
            }
        }

        $route = new Faker();
        $route->error = "Нет данных";

        return $route->getJson();
    }

    private function faker(): array
    {
        $route1 = new Faker();
        $route1->companyName = "pochta";
        $route1->sourceKladr = "Москва";
        $route1->targetKladr = "Санкт-Петербург";
        $route1->price = 200;
        $route1->date = "2023-10-10";

        $route2 = new Faker();
        $route2->companyName = "pochta";
        $route2->sourceKladr = "Москва";
        $route2->targetKladr = "Ижевск";
        $route2->price = 1000;
        $route2->date = "2023-10-20";

        return [$route1, $route2];
    }
}
