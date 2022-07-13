<?php

namespace Crypto\Controller;

use Crypto\Model\RequesUser;
use Crypto\Model\ExchangeRate;
use Crypto\Repository\CryptoRepository;
use Crypto\Repository\RequesRepository;
use Crypto\Repository\WeatherRepository;

class Login {
    public function showLogin($f3)
    {
        $weatherRepo = new WeatherRepository();
        $weather = $weatherRepo->getWeather();
        $f3->set('weather', $weather);

        if ($f3->get('REQUEST.msg') == 'fail') {
            $f3->set('error', 'Invlid username or password. Please try again');
            $f3->set('SESSION.login_attempts', $f3->get('SESSION.login_attempts', 0) + 1);
        }

        echo \Template::instance()->render('src/Template/login.html');
    }

    public function doLogin($f3)
    {
        $username = $f3->get('REQUEST.email');
        $password = $f3->get('REQUEST.password');
        $userData = $f3->get('DB')->exec('SELECT * FROM user_auth WHERE email=? LIMIT 1', $username);
        
        if (password_verify($password, $userData[0]['password'])) {
            $f3->set('SESSION.user', $userData);
            header('location: /crypto');
        } else {
            header('location: /crypto/login?msg=fail');
        }
    }
}