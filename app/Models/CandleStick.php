<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandleStick extends Model
{
    use HasFactory;

    protected $fillable = [
        "provider",
        "time_delay",
        "open",
        "high",
        "low",
        "close",
        "volume",
        "openTime",
        "closeTime",
        "assetVolume",
        "baseVolume",
        "trades",
        "assetBuyVolume",
        "takerBuyVolume",
        "ignored",
    ];
}
