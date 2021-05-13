<?php

namespace App\Service\Bot;

class Binance extends BotAbstractInterface
{
    public function start() : void
    {
        // api reference
        $api = new \Binance\RateLimiter(
            new \Binance\API("<api key>", "<secret>")
        );

        $api->caOverride = true;

        $ticker = $api->prices();
        print_r($ticker);


        // https://github.com/binance-exchange/php-binance-api
        // loop with settings delay
    }

    public function buy() : bool
    {
        // call api buy
    }

    public function sell() : bool
    {
        // call api sell
    }
}
