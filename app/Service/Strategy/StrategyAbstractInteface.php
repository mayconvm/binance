<?php

namespace App\Service\Strategy;

abstract class StrategyAbstractInteface
{
    protected StrategySettings $settings;

    public function __construct(StrategySettings $settings)
    {
        $this->settings = $settings;
    }

    abstract public function start();

    abstract public function analitic();

    abstract public function buy() : bool;

    abstract public function sell() : bool;

    abstract public function getValue() : float;
}
