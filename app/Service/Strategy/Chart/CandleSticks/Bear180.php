<?php

namespace App\Service\Strategy\Chart\CandleSticks;

class Bear180 extends CandleSticksAbstractInterface
{
    public function watch() : bool
    {
    }

    public function exist() : bool
    {
        dd(
            $this->ma(20),
            $this->ema(20),
            $this->wma(20),
            $this->avl(20),
        );
    }
}
