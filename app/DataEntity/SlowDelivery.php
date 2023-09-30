<?php

namespace app\DataEntity;

use app\DataEntity\Delivery;

/**
 * Mедленная доставка
 */
class SlowDelivery extends Delivery
{
    /**
     * Дата доставки 
     * @var string
     */
    private $date;

    /**
     * Коэффициент (конечная цена есть произведение
     * базовой стоимости и коэффициента)
     * @var
     */
    private $coefficient;


    /**
     * Дата доставки
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Дата доставки
     * @param string $date Дата доставки
     * @return SlowDelivery
     */
    public function setDate($date): SlowDelivery
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Коэффициент (конечная цена есть произведение
     * базовой стоимости и коэффициента)
     */
    public function getCoefficient(): float
    {
        return $this->coefficient;
    }

    /**
     * Коэффициент (конечная цена есть произведение
     * базовой стоимости и коэффициента)
     * @param  $coefficient Коэффициент (конечная цена есть произведение
     * @return SlowDelivery
     */
    public function setCoefficient($coefficient): SlowDelivery
    {
        $this->coefficient = $coefficient;
        return $this;
    }

    public function getArray(): array
    {
        return [
            "nameCompany" => empty($this->nameCompany) ? null : $this->nameCompany,
            "coefficient" => empty($this->coefficient) ? null : $this->coefficient,
            "date" => empty($this->date) ? null : $this->date,
            "error" => empty($this->error) ? null : $this->error,
        ];
    }

    public function getJson(): string
    {
        return json_encode($this->getArray(), JSON_UNESCAPED_UNICODE);
    }
}
