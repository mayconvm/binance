<?php

namespace App\Service\Strategy\Chart;

use App\Service\Strategy\Chart\CandleSticks\Adapter\BinanceAdapter;

abstract class ChartAbstractInterface
{
    protected $api;

    public function __construct($api = null)
    {
        $this->api = $api;
    }

    protected function setInstanceApi($api)
    {
        $this->api = $api;
    }

    public function getInstanceApi()
    {
        return $this->api;
    }

    public function getAdapter()
    {
        //todo: refatorar isso
        return new BinanceAdapter();
    }
}
