<?php

namespace Crypto\Repository;

use Crypto\Client\CryptoClient;
use GuzzleHttp\Client;

class CryptoRepository 
{
    private $client;

    public function __construct(Client $client = null)
    {
        // if no client was provided, create one
        if (!$client) {
            $client = new CryptoClient();
        }

        $this->client = $client;
    }
}
