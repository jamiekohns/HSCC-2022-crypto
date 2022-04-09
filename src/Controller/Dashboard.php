<?php

namespace Crypto\Controller;

use Crypto\Repository\WeatherRepository;
use Crypto\Repository\CryptoRepository;

class Dashboard {
    public function hello($f3) {
        echo "Hello from the Dashboard";
    }

    public function home($f3) {
        $weatherRepo = new WeatherRepository();
        $weather = $weatherRepo->getWeather();
        $cryptoRepo = new CryptoRepository($f3->get('secrets.CRYPTO_API_KEY'));
        
        // $symbols = $cryptoRepo->getSymbols();

        $f3->set('weather', $weather);
        $f3->set('btcPrice', $cryptoRepo->getPrice('BTC'));
        $f3->set('ethPrice', $cryptoRepo->getPrice('ETH'));
        $f3->set('shbPrice', $cryptoRepo->getPrice('SHIB'));

        echo \Template::instance()->render('src/Template/dash-a.html');
    }
}