<?php

namespace Crypto\Client;

use GuzzleHttp\Client;

/**
 * From: https://docs.coinapi.io/#endpoints
 */
class CryptoClient extends Client
{
    public function __construct(string $apiKey)
    {
        parent::__construct([
            'base_uri' => 'https://rest.coinapi.io/',
            'headers' => [
                'X-CoinAPI-Key' => $apiKey,
            ],
        ]);
    }
}
