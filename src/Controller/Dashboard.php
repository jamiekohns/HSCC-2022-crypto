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

        $f3->set('weather', $weather['consolidated_weather'][0]);

        echo \Template::instance()->render('src/Template/dash-a.html');
    }
}