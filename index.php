<?php

require 'vendor/autoload.php';

$f3 = \Base::instance();
$f3->config('config/globals.cfg');
$f3->config('config/routes.cfg');
$f3->config('config/secrets.cfg');

$db = new DB\SQL(
    sprintf(
        'mysql:host=%s;port=%s;dbname=%s',
        $f3->get('DB_HOST'),
        $f3->get('DB_PORT'),
        $f3->get('DB_NAME')
    ),
    $f3->get('secrets.DB_USER'),
    $f3->get('secrets.DB_PASS')
);
$f3->set('DB', $db);

$f3->run();