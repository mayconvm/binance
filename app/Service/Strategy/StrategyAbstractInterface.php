<?php

namespace App\Service\Strategy;

abstract class StrategyAbstractInterface
{
    protected StrategySettings $settings;

    protected $instanceApiToGetData;

    public function __construct(StrategySettings $settings, $instanceApiToGetData = null)
    {
        $this->settings = $settings;
        $this->instanceApiToGetData = $instanceApiToGetData;
    }

    abstract public function start();

    abstract public function analysis() : void;

    abstract public function buy() : bool;

    abstract public function sell() : bool;

    abstract public function getValue() : float;

    public function getInstanceApiToGetData()
    {
        if (empty($this->instanceApiToGetData)) {
            throw new \Exception("não há instanceApiToGetData, trocar essas exception;", 1);
        }

        return $this->instanceApiToGetData;
    }

    public function setInstanceApiToGetData($api)
    {
        $this->instanceApiToGetData = $api;
    }
}
