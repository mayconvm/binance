<?php

namespace App\Service\Strategy;

use App\Service\Strategy\Chart\CandleSticks\Adapter\CandleSticksAdapterAbstractInterface;

// TODO: separar em outros interfaces
// TODO: adicionar trait para médias
abstract class StrategyAbstractInterface
{
    const TYPE_ORDER_MARKET = 'MARKET';

    const TYPE_ORDER_LIMIT = 'LIMIT';

    protected StrategySettings $settings;

    protected $instanceApiToGetData;

    protected float $buy;

    protected float $sell;

    protected float $stop;

    protected string $typeOrder;

    //TODO: refactory use the class CandleSticksAdapterAbstractInterface
    public function __construct(
        StrategySettings $settings,
        CandleSticksAdapterAbstractInterface $instanceApiToGetData = null
    ) {
        $this->settings = $settings;
        $this->instanceApiToGetData = $instanceApiToGetData;
    }

    abstract public function start();

    abstract public function analysis() : void;

    public function stop() : float
    {
        return $this->stop;
    }

    public function buy() : float
    {
        return $this->buy;
    }

    public function sell() : float
    {
        return $this->sell;
    }

    public function typeOrder() : string
    {
        return $this->typeOrder;
    }

    public function getInstanceApiToGetData()
    {
        if (empty($this->instanceApiToGetData)) {
            throw new \Exception("não há instanceApiToGetData, trocar essas exception;", 1);
        }

        return $this->instanceApiToGetData;
    }

    public function setInstanceApiToGetData($api)
    {
        $this->instanceApiToGetData = $api;
    }

    /**
     * Movin Average
     * @param  int    $quantity Quantity sticks
     * @return float
     */
    public function ma(int $quantity) : float
    {
        $content = $this->getInstanceApiToGetData()->getData($quantity);
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
}
