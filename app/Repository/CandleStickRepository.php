<?php

namespace App\Repository;

use App\Models\CandleStick;

class CandleStickRepository
{
    public function __construct(
        private CandleStick $model
    ) {
    }
}
