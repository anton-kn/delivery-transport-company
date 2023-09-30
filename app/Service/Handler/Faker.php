<?php

namespace app\Service\Handler;

/**
 * Класс предназначен для иммитанции данных транспортной компании
 */
class Faker
{
    /**
     * От куда
     */
    public string $sourceKladr;

    /**
     * Куда
     */
    public string $targetKladr;

    /**
     * Вес
     */
    public float $weight;

    /**
     * Имя компании
     */
    public string $companyName;

    public float $price;

    public string $date;

    public string $error;

    public function getArray(): array
    {
        return [
            'companyName' => empty($this->companyName) ? null : $this->companyName,
            'price' => empty($this->price) ? null : $this->price,
            'date' => empty($this->date) ? null : $this->date,
            'error' => empty($this->error) ? null : $this->error,
        ];
    }

    public function getJson()
    {
        return json_encode($this->getArray(), JSON_UNESCAPED_UNICODE);
    }
}
