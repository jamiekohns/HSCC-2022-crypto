<?php

namespace Crypto\Controller;

use Crypto\Repository\CryptoRepository;
use Crypto\Repository\RequesRepository;

class Profile {
    public function getUserProfile($f3)
    {
        $userId = $f3->get('REQUEST.user_id', 0);
        $repo = new RequesRepository();
        $user = $repo->getUser($userId);
        $f3->set('user', $user);

        $coins = $f3->get('DB')->exec(
            'SELECT * FROM user_coins WHERE user_id = ?', 
            $user->getId()
        );

        $repo = new CryptoRepository($f3->get('secrets.CRYPTO_API_KEY'));
        foreach ($coins as $idx => $coin) {
            $coins[$idx]['exchange_rate'] = $repo->getPrice($coin['asset_id_base'], $coin['asset_id_quote']);
        }
        $f3->set('tracked_coins', $coins);

        echo \Template::instance()->render('src/Template/profile.html');
    }
}