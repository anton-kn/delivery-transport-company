<?php

namespace app;

/**
 * Summary of Request
 */
class Request
{

    /**
     * Массив запроса
     * @var array
     */
    private $request = null;

    /**
     * Запускаем обработчик запросов
     * по умолчанию GET
     * @param string $type = null
     */
    public function start(): Request
    {
        if (isset($_GET) && !empty($_GET)) {
            $this->request = $_GET;
        }

        return $this;
    }

    /**
     * Получаем массив запроса
     * @return array
     */
    public function getRequest(): array
    {
        return $this->request;
    }


    /**
     * Наличие параметров запроса
     * @return bool
     */
    public function isRequest()
    {
        if ($this->request) {
            return true;
        }

        return false;
    }

    /**
     * Делаем так, чтобы обращаться по имени к переменным запроса
     */
    public function __call($name, $arguments = null)
    {
        foreach ($this->request as $key => $value) {
            if ($name == $key) {
                return $value;
            }
        }
    }
}
