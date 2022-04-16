<?php
ini_set('memory_limit', '1G');
require 'vendor/autoload.php';

$f3 = \Base::instance();
$f3->config('config/globals.cfg');
$f3->config('config/routes.cfg');
$f3->config('config/secrets.cfg');
$f3->run();