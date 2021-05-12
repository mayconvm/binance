<?php

namespace App\Service\Bot;

abstract class BotAbstractInterface
{
    private StrategyAbstractInteface $strategy;

    protected BotSettings $botSettings;

    public function __construct(
        StrategyAbstractInteface $strategy,
        BotSettings $botSettings
    ) {
        $this->strategy = $strategy;
        $this->botSettings = $botSettings;
    }

    abstract public function start() : void;

    abstract public function buy() : bool;

    abstract public function sell() : bool;
}
