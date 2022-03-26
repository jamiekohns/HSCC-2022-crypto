<?php

namespace Crypto\Controller;

use Crypto\Repository\WeatherRepository;

class Dashboard {
    public function hello($f3) {
        echo "Hello from the Dashboard";
    }

    public function home($f3) {
        $weatherRepo = new WeatherRepository();
        $weather = $weatherRepo->getWeather();

        $f3->set('weather', $weather['consolidated_weather'][0]);

        echo \Template::instance()->render('src/Template/dash-a.html');
    }
}