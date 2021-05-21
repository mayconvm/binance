<?php

namespace App\Service;

use App\Service\Bot\BotBinance;
use App\Service\Bot\BotSettings;
use App\Service\Strategy\Simple;
use App\Service\Strategy\StrategySettings;

class BinanceService
{
    public function __construct()
    {
    }

    public function getSecurityData()
    {
        // get database
        // apply criptografy
        return [
            "api-key"    => "",
            "api-secret" => "",
        ];
    }

    public function getSettingsStrategy()
    {
        return new StrategySettings([
            'time_candle'       => '5m',
            'value_short_avg'   => '20',
            'value_long_avg'    => '200',
            'profit'            => '4.2',
        ]);
    }

    public function getStrategy()
    {
        // TODO: add posible to mutiples variables
        return new Simple(
            $this->getSettingsStrategy()
        );
    }

    public function executeBot()
    {
        $settingsBot = new BotSettings([] + $this->getSecurityData());
        $strategy = $this->getStrategy();

        $bot = new BotBinance(
            $strategy,
            $settingsBot
        );

        while ($bot->exec()) {
            $bot->analysis();
            $bot->buy();
            $bot->sell();
            dd("oi");
        }
    }
}
