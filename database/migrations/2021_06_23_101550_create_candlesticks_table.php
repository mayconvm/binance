<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandlesticksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candlesticks', function (Blueprint $table) {
            $table->id();

            $table->string("provider");
            $table->string("time_delay");
            $table->float("open");
            $table->float("high");
            $table->float("low");
            $table->float("close");
            $table->float("volume");
            $table->float("openTime");
            $table->float("closeTime");
            $table->float("assetVolume");
            $table->float("baseVolume");
            $table->float("trades");
            $table->float("assetBuyVolume");
            $table->float("takerBuyVolume");
            $table->float("ignored");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candlesticks');
    }
}
