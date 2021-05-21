<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Service\BinanceService;

class BotController extends Controller
{
    public function __construct(BinanceService $binanceService)
    {
        $this->binanceService = $binanceService;
    }

    public function index()
    {
        $bot = 'Binance';
        $strategy = 'Simple';

        $this->binanceService->executeBot();

        return ['ok' => true];
    }
}
