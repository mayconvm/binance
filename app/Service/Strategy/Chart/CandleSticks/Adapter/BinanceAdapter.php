<?php

namespace App\Service\Strategy\Chart\CandleSticks\Adapter;

class BinanceAdapter extends CandleSticksAdapterAbstractInterface
{
    public function __construct()
    {
        // $this->file = file_get_contents(storage_path('/examples/sticks.json'));
        // $this->file = file_get_contents(storage_path('/examples/bear180.json'));
        $this->file = file_get_contents(storage_path('/examples/bull180.json'));

        #dd($this->file);
    }

    public function getData(int $quantity = 1000)
    {
        $data = json_decode($this->file, true);
        return array_slice($data, count($data) - $quantity, $quantity, true);
    }
}
