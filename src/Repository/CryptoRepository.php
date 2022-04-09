<?php

namespace Crypto\Repository;

use Crypto\Client\CryptoClient;
use GuzzleHttp\Client;

class CryptoRepository 
{
    private $client;

    public function __construct(string $apiKey, Client $client = null)
    {
        // if no client was provided, create one
        if (!$client) {
            $client = new CryptoClient($apiKey);
        }

        $this->client = $client;
    }

    public function getPrice($symbol, $currency = 'USD')
    {
        
    }
}
