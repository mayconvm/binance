<?php

namespace App\Service;

use App\Repository\CandleStickRepository;

class CandleStickService
{
    public function __construct(
        protected CandleStickRepository $candleStickRepository
    ) {
    }
}
