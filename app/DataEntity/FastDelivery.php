<?php

namespace app\DataEntity;

use app\DataEntity\Delivery;

/**
 * Быстрая доставка
 */
class FastDelivery extends Delivery
{

    /**
     * Период
     * @var integer
     */
    protected $period;

    /**
     * Cтоимость
     * @var float
     */
    protected $price;

    /**
     * Cтоимость
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Cтоимость
     * @param float $price Cтоимость
     * @return self
     */
    public function setPrice($price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Период
     * @return integer
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Период
     * @param integer $period Период
     * @return self
     */
    public function setPeriod($period): self
    {
        $this->period = $period;
        return $this;
    }

    public function getArray(): array
    {
        return [
            "nameCompany" => empty($this->nameCompany) ? null : $this->nameCompany,
            "price" => empty($this->price) ? null : $this->price,
            "period" => empty($this->period) ? null : $this->period,
            "error" => empty($this->error) ? null : $this->error,
        ];
    }

    public function getJson()
    {
        return json_encode($this->getArray(), JSON_UNESCAPED_UNICODE);
    }
}
