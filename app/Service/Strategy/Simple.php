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

        // encontra bear180
        $bull180 = $chartSticks->getBull180();
        if (!$bull180->exist(3, 2)) {
            return;
        }

        // TODO: verifica se a média ...

        // compra a valor de mercado
        // stop no valor do 2/3 do último candle
        // venda há 5%

        $this->typeOrder = self::TYPE_ORDER_LIMIT;

        $valueMarket = $bull180->getLastValue();
        $valueLastOpen = $bull180->getOpenValue();
        $profit = $this->settings->getPercentProfit();

        $sellAndProfit = $valueMarket + ($valueMarket * $profit);

        $this->buy = $valueMarket;
        $this->sell = $sellAndProfit;
        $this->stop = $valueLastOpen;
    }
}
