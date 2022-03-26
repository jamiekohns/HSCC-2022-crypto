<?php

namespace Crypto\Client;

use GuzzleHttp\Client;

/**
 * From: https://docs.coinapi.io/#endpoints
 */
class CryptoClient extends Client
{
    public function __construct()
    {
        parent::__construct([
            'base_uri' => 'https://rest.coinapi.io/',
            'headers' => [
                'X-CoinAPI-Key' => '4E1DF9F6-ECD7-4C5D-9128-44B2C5311F3A',
            ],
        ]);
    }
}
