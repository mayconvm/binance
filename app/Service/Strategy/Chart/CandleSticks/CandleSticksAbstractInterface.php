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

    abstract public function watch();

    abstract public function exist() : bool;

    /**
     * Movin Average
     * @param  int    $quantity Quantity sticks
     * @return float
     */
    public function ma(int $quantity) : float
    {
        $content = $this->adapter->getData($quantity);
        $total = count($content);

        if (!$total) {
            return 0;
        }

        $maa = 0;
        foreach ($content as $key => $item) {
            $maa += $item['close'];
        }

        return $maa/$total;
    }

    /**
     * Exponencial moving average
     * @param  int    $quantity [description]
     * @return float
     */
    public function ema(int $quantity) : float
    {

        return 0;
    }

    /**
     * Weighted Moving Average
     * @param  int    $quantity [description]
     * @return float
     */
    public function wma(int $quantity) : float
    {

        return 0;
    }

    /**
     * Average simple
     * @return float
     */
    public function avl() : float
    {
        return $this->ma(1000000);
    }

    protected function getData(int $quantity = 10000)
    {
        return $this->adapter->getData($quantity);
    }
}
