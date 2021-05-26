<?php

namespace App\Service\Strategy;

use App\Service\Strategy\Chart\CandleSticksChart;

class Simple extends StrategyAbstractInterface
{
    public function start()
    {
    }

    public function analysis() : void
    {
        // analysis chart
        $chartSticks = new CandleSticksChart(
            $this->getInstanceApiToGetData()
        );

        $bear180 = $chartSticks->getBear180();
        $bull180 = $chartSticks->getBull180();
        dd(
            $bear180->exist(3, 1),
            $bull180->exist(3, 2)
        );
    }

    public function buy() : bool
    {
    }

    public function sell() : bool
    {
    }

    public function getValue() : float
    {
    }

}
