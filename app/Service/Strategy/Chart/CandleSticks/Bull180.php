<?php

namespace App\Service\Strategy\Chart\CandleSticks;

class Bull180 extends CandleSticksAbstractInterface
{
    public function watch(int $timeSecond = 1, int $quantatySticks = 3, float $percLengthDiff = 2)
    {
        while (true) {
            yield $this->exist($quantatySticks, $percLengthDiff);

            sleep($timeSecond);
        }
    }

    public function exist(int $quantatySticks = 3, float $percLengthDiff = 2) : bool
    {
        $data = array_values($this->getData($quantatySticks));
        $percLengthDiff = $percLengthDiff/100;

        // TODO: essa classe não deve conhecer a estrutura dos dados que veio da binance
        foreach ($data as $key => $value) {
            if (($key - 1) < 0) {
                continue;
            }

            if ($value['close'] > $value['open']
                && $value['close'] > ($data[$key - 1]['open'] ?? 0)
                && (1 - ($value['open'] / $value['close'])) > $percLengthDiff
                && (1 - ($data[$key - 1]['close'] / $data[$key - 1]['open'])) > $percLengthDiff
            ) {
                // echo $key . ' - ' .
                //     $value['open'] . ' - ' .
                //     $value['close'] . ' - ' .
                //     $percLengthDiff . ' - ' .
                //     (1 - ($value['open'] / $value['close'])). ' - ' .
                //     (1 - ($data[$key - 1]['close'] / $data[$key - 1]['open'])) . ' - ' .
                // "\n<br>";

                return true;
            }
        }

        return false;
    }
}
