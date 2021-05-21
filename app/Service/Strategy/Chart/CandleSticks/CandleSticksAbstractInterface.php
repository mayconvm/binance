<?php

namespace App\Service\Strategy\Chart\CandleSticks;

abstract class CandleSticksAbstractInterface
{
    protected CandleSticksAdapterAbstractInterface $adapter;

    public function __construct(CandleSticksAdapterAbstractInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    abstract public function watch() : bool;

    abstract public function exist() : bool;

    /**
     * Movin Average
     * @param  int    $quantity Quantity sticks
     * @return float
     */
    public function ma(int $quantity) : float
    {
    }

    /**
     * Exponencial moving average
     * @param  int    $quantity [description]
     * @return float
     */
    public function ema(int $quantity) : float
    {
    }

    /**
     * Weighted Moving Average
     * @param  int    $quantity [description]
     * @return float
     */
    public function wma(int $quantity) : float
    {
    }

    /**
     * Average simple
     * @param  int    $quantity [description]
     * @return [type]           [description]
     */
    public function avl(int $quantity) : float
    {
    }
}
