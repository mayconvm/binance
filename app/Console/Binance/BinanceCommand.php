<?php

namespace App\Console\Binance;

use Illuminate\Console\Command;
use App\Service\BinanceService;
use App\Service\CandleStickService;

class BinanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bot:binance-candlestick {stock} {time}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get last candlestick';


    /**
     * Execute the console command.
     *
     * @param  \App\Support\DripEmailer  $drip
     * @return mixed
     */
    public function handle(BinanceService $botBinance, CandleStickService $candleStickService)
    {
        $stock = $this->argument('stock');
        $time = $this->argument('time');

        $this->info("Start bot to Binance to stock {$stock} with time to {$time}.");

        $api = $botBinance->getBot()
            ->getInstanceApi()
        ;


        // resumo sobre a moeda
        // $api->ticker($stock, function ($api, $symbol, $ticker) {
        //     print_r($ticker);
        // });

        // consolida os dados e enviar um dado novo a cada time. Porém a função é chamada a cada 1s
        // TODO: essa função irã estourar a mémoria. Refatorar a lib depois
        $api->chart([$stock], $time, function ($api, $symbol, $chart) {
            echo "{$symbol} chart update\n";
            print_r($chart);
        }, 2);

        // atualização a cada segundo do preço
        // https://binance-docs.github.io/apidocs/spot/en/#kline-candlestick-streams
        // $api->kline([$stock], $time, function ($api, $symbol, $chart) {
        //   //echo "{$symbol} ({$interval}) candlestick update\n";
        //     $interval = $chart->i;
        //     $tick = $chart->t;
        //     $open = $chart->o;
        //     $high = $chart->h;
        //     $low = $chart->l;
        //     $close = $chart->c;
        //     $volume = $chart->q; // +trades buyVolume assetVolume makerVolume
        //     echo "{$symbol} price: {$close}\t volume: {$volume}\n";
        // });



        // conexão com o socket
        // a cada resposta gravar na base de dados.
    }
}
