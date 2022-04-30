<?php

namespace Crypto\Controller;

use Crypto\Repository\CryptoRepository;
use Crypto\Repository\RequesRepository;
use Crypto\Repository\WeatherRepository;

class Dashboard {
    public function hello($f3) 
    {
        echo "Hello from the Dashboard";
    }

    public function home($f3) 
    {
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

    public function symbols($f3)
    {
        $cryptoRepo = new CryptoRepository($f3->get('secrets.CRYPTO_API_KEY'));
        $symbols = $cryptoRepo->getSymbols();

        foreach ($symbols as $symbol) {
            echo $symbol->getSymbolExchangeRate();
            echo '<br>';
        }
    }

    public function getRequesUsers($f3)
    {
        $repo = new RequesRepository();
        $users = $repo->getUsers($_GET['page']);
        $f3->set('users', $users);

        $user_auths = $f3->get('DB')->exec('SELECT * FROM user_auth');
        $f3->set('user_auths', $user_auths);

        echo \Template::instance()->render('src/Template/users.html');
    }
}