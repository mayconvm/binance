<?php

namespace App\Service\Strategy\Chart;

use App\Service\Strategy\Chart\CandleSticks\Bear180;
use App\Service\Strategy\Chart\CandleSticks\Bull180;

class CandleSticksChart extends ChartAbstractInterface
{
    public function getBear180()
    {
        $instance = new Bear180(
            $this->getAdapter()
        );

        return $instance;
    }

    public function getBull180()
    {
        $instance = new Bull180(
            $this->getAdapter()
        );

        return $instance;
    }
}
