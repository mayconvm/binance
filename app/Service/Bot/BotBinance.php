<?php

namespace App\Service\Bot;

use App\Service\Strategy\StrategyAbstractInterface;

class BotBinance extends BotAbstractInterface
{

    const TYPE_ORDER = [
        StrategyAbstractInterface::TYPE_ORDER_MARKET => 'MARKET',
        StrategyAbstractInterface::TYPE_ORDER_LIMIT  => 'STOP_LOSS',
    ];

    protected function boot() : void
    {
        // para testes
        // https://academy.binance.com/en/articles/binance-api-series-pt-1-spot-trading-with-postman
        // 1 - Criar token aqui https://testnet.binance.vision/
        // 2 - links da api  de teste https://testnet.binance.vision/

        // API DE TEST
        // API Key: IFQPkW6x9gXj0v4tIFncz5jQtn00hIyfNtYbCHxnGVuXhBrmVA6zNGpwsHGDxgCG
        // Secret Key: V08liz5phwUQHHxauSwnRPz9joYdA9SM7bqNDhgLSbaYKaupOW5KBRHEop8r4VQz


        // api reference
        // https://github.com/binance-exchange/php-binance-api
        // $this->api = new \Binance\RateLimiter(
            // new \Binance\API(
            $this->api = new \Binance\API(
                "IFQPkW6x9gXj0v4tIFncz5jQtn00hIyfNtYbCHxnGVuXhBrmVA6zNGpwsHGDxgCG",
                "V08liz5phwUQHHxauSwnRPz9joYdA9SM7bqNDhgLSbaYKaupOW5KBRHEop8r4VQz",
                true
            );
        // );

        // $ticker = $this->api->prices(); // Make sure you have an updated ticker object for this to work
        // $balances = $this->api->balances($ticker);
        // dd($balances);

        // $history = $this->api->history("BNBBTC");
        // $allOrders = $this->api->orders("BNBBTC");
        // dd($history, $allOrders);

        // $this->api->caOverride = true;
        // $this->api->httpDebug = true;

        // dd("credo");

        // $this->setInstanceApi('1');
    }

    // prepara o bot para realizar operação
    // indica que está disponível para operar
    // https://github.com/binance-exchange/php-binance-api
    public function exec() : bool
    {
        // obter dados do grafico
        // $ticks = $this->api->candlesticks("BNBBTC", "5m");
        // print_r($ticks);
        // dd(
            // $ticks,
            // $this->api->assetDetail(),
            // $this->api->exchangeInfo(),
            // $this->api->account(),
        // );


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

    public function execOrder() : bool
    {
        $this->api->useServerTime();
        // if (!$this->buy && !$this->sell) {
        //     return false;
        // }
        //

        // ordens abertas
        // dd($this->api->openOrders());

        // Set the type STOP_LOSS (market) or STOP_LOSS_LIMIT, and TAKE_PROFIT (market) or TAKE_PROFIT_LIMIT
        $type = StrategyAbstractInterface::TYPE_ORDER_LIMIT;

        $typeOrder = $this->getTypeOrder($type);
        // When the stop is reached, a stop order becomes a market order
        $quantity = 1;
        $price = 0.5; // Try to sell it for 0.5 btc
        $stopPrice = 0.4; // Sell immediately if price goes below 0.4 btc

        $order = $this->api->marketSell("BNBBTC", $quantity);
        // $order = $this->api->sell("BNBBTC", $quantity, $price, $typeOrder, ["stopPrice" => $stopPrice]);
        dd($order);
    }

    public function getTypeOrder(string $type) : string
    {
        if (!isset(self::TYPE_ORDER[$type])) {
            throw new \Exception("Type order not defined.");
        }

        return self::TYPE_ORDER[$type];
    }
}
