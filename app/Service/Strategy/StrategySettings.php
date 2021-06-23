<?php

namespace App\Service\Strategy;

class StrategySettings extends \ArrayObject
{
    public function __construct($input = [])
    {
        parent::__construct($input, self::ARRAY_AS_PROPS);
    }

    public function getProfit() : float
    {
        if ($this->profit) {
            return $this->profit;
        }

        throw new \Exception('Profit not setting');
    }


    public function getPercentProfit() : float
    {
        return $this->getProfit() / 100;
    }
}
