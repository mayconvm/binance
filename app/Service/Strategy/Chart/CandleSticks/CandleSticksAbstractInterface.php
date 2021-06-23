<?php

namespace App\Service\Strategy\Chart\CandleSticks;

use App\Service\Strategy\Chart\CandleSticks\Adapter\CandleSticksAdapterAbstractInterface;

abstract class CandleSticksAbstractInterface
{
    protected CandleSticksAdapterAbstractInterface $adapter;

    public function __construct(CandleSticksAdapterAbstractInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    abstract public function watch(int $timeSecond = 1);

    abstract public function exist() : bool;

    abstract public function getLastValue() : float;

    abstract public function getOpenValue() : float;

    protected function getData(int $quantity = 10000)
    {
        return $this->adapter->getData($quantity);
    }
}
