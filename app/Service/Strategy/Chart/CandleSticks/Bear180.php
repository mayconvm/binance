<?php

namespace App\Service\Strategy\Chart\CandleSticks;

class Bear180 extends CandleSticksAbstractInterface
{
    protected array $itemFound;

    public function watch(int $timeSecond = 1, int $quantatySticks = 3, float $percLengthDiff = 2)
    {
        while (true) {
            sleep($timeSecond);
            yield $this->exist($quantatySticks, $percLengthDiff);
        }
    }

    public function exist(int $quantatySticks = 3, float $percLengthDiff = 2) : bool
    {
        $data = array_values($this->getData($quantatySticks));
        $percLengthDiff = $percLengthDiff/100;

        // TODO: essa classe não deve conhecer a estrutura dos dados que veio da binance
        $diff = [];
        foreach ($data as $key => $value) {
            if (($key - 1) < 0) {
                continue;
            }

            if ($value['close'] < $value['open']
                && $value['close'] < ($data[$key - 1]['close'] ?? 0)
                && (1 - ($value['close'] / $value['open'])) > $percLengthDiff
                && (1 - ($data[$key - 1]['open'] / $data[$key - 1]['close'])) > $percLengthDiff
            ) {
                // echo $key . ' - ' .
                //     $value['close'] . ' - ' .
                //     $value['open'] . ' - ' .
                //     $percLengthDiff . ' - ' .
                //     (1 - ($value['close'] / $value['open'])) . ' - ' .
                //     (1 - ($data[$key - 1]['open'] / $data[$key - 1]['close'])) . ' - ' .
                // "\n<br>";

                $this->itemFound = $value;
                return true;
            }
        }

        return false;
    }

    public function getLastValue() : float
    {
        return $this->itemFound['close'];
    }

    public function getOpenValue() : float
    {
        return $this->itemFound['open'];
    }
}
