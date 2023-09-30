<?php

namespace app\DataEntity;

/**
 * Доставка
 */
class Delivery
{
    /**
     * Наименование компании
     * @var string
     */
    protected $nameCompany;

    /**
     * Ошибка
     * @var string
     */
    protected $error;


    /**
     * Ошибка
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Ошибка
     * @param string $error Ошибка
     * @return self
     */
    public function setError($error): Delivery
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Наименование компании
     * @return string
     */
    public function getNameCompany()
    {
        return $this->nameCompany;
    }

    /**
     * Наименование компании
     * @param string $nameCompany Наименование компании
     * @return FastDelivery
     */
    public function setNameCompany($nameCompany): Delivery
    {
        $this->nameCompany = $nameCompany;
        return $this;
    }
}
