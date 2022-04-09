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

    public function getExchanges()
    {
        try {
            $uri = 'exchanges';
            $response = $this->client->request('GET', $uri);

            $data = json_decode($response->getBody()->getContents(), true);

            return $data;
        } catch (\Exception $e) {
            die($e->getMessage());
            return [
                'error' => $e->getMessage(),
            ];
        }

        return [];
    }

    public function getSymbols($exchange = 'COINBASE')
    {
        try {
            $uri = 'symbols';
            $response = $this->client->request('GET', $uri, [
                'query' => [
                    'filter_exchange_id' => 'COINBASE',
                    'filter_symbol_id' => 'BTC',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            return $data;
        } catch (\Exception $e) {
            die($e->getMessage());
            return [
                'error' => $e->getMessage(),
            ];
        }

        return [];
    }

    public function getPrice($symbol, $currency = 'USD')
    {
        try {
            $uri = sprintf(
                'exchangerate/%s/%s',
                $symbol,
                $currency
            );

            $response = $this->client->request('GET', $uri);

            $data = json_decode($response->getBody()->getContents(), true);

            return $data;
        } catch (\Exception $e) {
            die($e->getMessage());
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
