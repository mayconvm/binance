<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Service\Bot\Binance;
use App\Service\Strategy\Simple;
use App\Service\Bot\BotSettings;
use App\Service\Strategy\StrategySettings;

class BotController extends Controller
{
    public function index()
    {
        $bot = new Binance(
            new Simple(
                new StrategySettings
            ),
            new BotSettings
        );

        $bot->start();

        return ['ok' => true];
    }
}
