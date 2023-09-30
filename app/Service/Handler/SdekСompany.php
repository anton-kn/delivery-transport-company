<?php

namespace app\Service\Handler;

use app\Request;
use app\Service\Handler\Faker;


/**
 * ТК СДЭК
 */
class SdekСompany implements TransportСompany
{
    /**
     * Коэффициент для расчета стоимости от весовки
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
        // иммитируем данные от компании
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
        $route1->companyName = "sdek";
        $route1->sourceKladr = "Москва";
        $route1->targetKladr = "Санкт-Петербург";
        $route1->price = 300;
        $route1->date = "2023-10-15";

        $route2 = new Faker();
        $route2->companyName = "sdek";
        $route2->sourceKladr = "Москва";
        $route2->targetKladr = "Ижевск";
        $route2->price = 1000;
        $route2->date = "2023-10-25";

        return [$route1, $route2];
    }
}
