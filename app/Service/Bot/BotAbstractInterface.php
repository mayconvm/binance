<?php

namespace App\Service\Bot;

use App\Service\Strategy\StrategyAbstractInterface;

abstract class BotAbstractInterface
{
    private StrategyAbstractInterface $strategy;

    protected BotSettings $botSettings;

    public function __construct(
        StrategyAbstractInterface $strategy,
        BotSettings $botSettings
    ) {
        $this->strategy = $strategy;
        $this->botSettings = $botSettings;

        $this->boot();
    }

    abstract public function start() : void;

    abstract public function buy() : bool;

    abstract public function sell() : bool;

    protected function boot() : void
    {
    }
}
