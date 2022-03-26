<?php

namespace Crypto\Client;

use GuzzleHttp\Client;

/**
 * From: https://www.metaweather.com/api/
 */
class WeatherClient extends Client
{
    public function __construct()
    {
        parent::__construct([
            'base_uri' => 'https://www.metaweather.com/api/',
        ]);
    }
}
