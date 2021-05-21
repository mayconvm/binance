<?php

namespace App\Service\Bot;

class BotBinance extends BotAbstractInterface
{
    protected function boot() : void
    {
        // api reference
        // $this->api = new \Binance\RateLimiter(
        //     new \Binance\API("<api key>", "<secret>")
        // );

        // $this->api->caOverride = true;

        $this->setInstanceApi('1');
    }

    // prepara o bot para realizar operação
    // indica que está disponível para operar
    public function exec() : bool
    {
        // obter dados do grafico
        // $ticks = $this->api->candlesticks("BNBBTC", "5m");
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

        return true;
    }

    // faz analise do mercado
    public function analysis() : void
    {
        $this->strategy->analysis();
    }

    // executa operação de compra
    public function buy() : bool
    {
        // call api buy
        return false;
    }

    // executa operação de venda
    public function sell() : bool
    {
        // call api sell
        return false;
    }
}
