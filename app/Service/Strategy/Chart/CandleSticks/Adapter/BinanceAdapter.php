<?php

namespace App\Service\Strategy\Chart\CandleSticks\Adapter;

class BinanceAdapter extends CandleSticksAdapterAbstractInterface
{
    public function __construct()
    {
        $this->file = file_get_contents(storage_path('/examples/sticks.json'));

        dd($this->file);
    }
}
