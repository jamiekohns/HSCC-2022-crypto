<?php

namespace Crypto\Controller;

use Crypto\Model\Weather;
use Crypto\Repository\CryptoRepository;
use Crypto\Repository\WeatherRepository;

class Dashboard {
    public function hello($f3) {
        echo "Hello from the Dashboard";
    }

    public function home($f3) {
        $weatherRepo = new WeatherRepository();
        $data = $weatherRepo->getWeather();
        $weather = new Weather($data);
        $f3->set('weather', $weather);

        $cryptoRepo = new CryptoRepository($f3->get('secrets.CRYPTO_API_KEY'));        


        echo \Template::instance()->render('src/Template/dash-a.html');
    }
}