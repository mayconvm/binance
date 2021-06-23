<?php

namespace App\Service\Bot;

use App\Service\Strategy\StrategyAbstractInterface;

abstract class BotAbstractInterface
{
    protected StrategyAbstractInterface $strategy;

    protected BotSettings $botSettings;

    protected $api;

    protected $buy;

    protected $sell;

    public function __construct(
        StrategyAbstractInterface $strategy,
        BotSettings $botSettings
    ) {
        $this->strategy = $strategy;
        $this->botSettings = $botSettings;

        $this->boot();

        // instance api to get history data about strategy
        $this->strategy->setInstanceApiToGetData($this->getInstanceApi());
    }

    abstract protected function boot() : void;

    abstract public function exec() : bool;

    abstract public function analysis() : void;

    abstract public function buy() : bool;

    abstract public function sell() : bool;

    abstract public function execOrder() : bool;

    protected function setInstanceApi($api)
    {
        $this->api = $api;
    }

    public function getInstanceApi()
    {
        return $this->api;
    }

    abstract public function getTypeOrder(string $type) : string;
}
