<?php

namespace App\Service\Bot;

class BotBinance extends BotAbstractInterface
{
    protected function boot()
    {
        // api reference
        $this->api = new \Binance\RateLimiter(
            new \Binance\API("<api key>", "<secret>")
        );

        $this->api->caOverride = true;
    }

    // prepara o bot para realizar operação
    // indica que está disponível para operar
    public function start() : bool
    {
        return false;

        // obter dados do grafico
        // $ticks = $api->candlesticks("BNBBTC", "5m");
        // print_r($ticks);

        // websocket para ficar obtendo dados das moedas
        // $api->kline(["BTCUSDT", "EOSBTC"], "5m", function ($api, $symbol, $chart) {
        //   //echo "{$symbol} ({$interval}) candlestick update\n";
        //     $interval = $chart->i;
        //     $tick = $chart->t;
        //     $open = $chart->o;
        //     $high = $chart->h;
        //     $low = $chart->l;
        //     $close = $chart->c;
        //     $volume = $chart->q; // +trades buyVolume assetVolume makerVolume

        //     \Log::info("{$symbol} price: {$close}\t volume: {$volume}\n");
        //     // echo "{$symbol} price: {$close}\t volume: {$volume}\n";
        // });

        #$ticker = $api->prices('ETHBTC');
        #print_r($ticker);


        // https://github.com/binance-exchange/php-binance-api
        // loop with settings delay
    }

    // executa operação de compra
    public function buy() : bool
    {
        // call api buy
    }

    // executa operação de venda
    public function sell() : bool
    {
        // call api sell
    }
}
