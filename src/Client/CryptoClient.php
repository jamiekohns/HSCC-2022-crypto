<?php

namespace Crypto\Client;

use GuzzleHttp\Client;

/**
 * From: https://docs.coinapi.io/#endpoints
 */
class CryptoClient extends Client
{
    public function __construct($apiKey)
    {
        parent::__construct([
            'base_uri' => 'https://rest.coinapi.io/v1/',
            'headers' => [
                'X-CoinAPI-Key' => $apiKey,
            ],
        ]);
    }
}
