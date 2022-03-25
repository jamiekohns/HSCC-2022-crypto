<?php

namespace Crypto\Controller;

class Dashboard {
    public function hello($f3) {
        echo "Hello from the Dashboard";
    }

    public function home($f3) {
        $f3->set('date', date('r'));
        echo \Template::instance()->render('src/Template/dash-a.html');
    }
}