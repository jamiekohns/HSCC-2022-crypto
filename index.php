<?php

require 'vendor/autoload.php';

$f3 = \Base::instance();
$f3->config('src/Config/globals.cfg');
$f3->config('src/Config/routes.cfg');
$f3->run();