<?php

namespace App\Service\Strategy\Chart;

use App\Service\Strategy\Chart\CandleSticks\Bear180;

class CandleSticksChart extends ChartAbstractInterface
{
    public function getBear180()
    {
        $instance = new Bear180(
            $this->getAdapter()
        );
    }
}
