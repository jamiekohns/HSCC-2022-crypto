<?php

namespace Crypto\Repository;

use GuzzleHttp\Client;
use Crypto\Model\Symbol;
use Crypto\Model\ExchangeRate;
use Crypto\Client\CryptoClient;
use Crypto\Repository\Repository;

class CryptoRepository extends Repository
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
            dd($e->getMessage());
            return [
                'error' => $e->getMessage(),
            ];
        }

        return [];
    }

    public function getSymbols($exchange = 'COINBASE', $symbol = 'BTC')
    {
        try {
            $uri = 'symbols';
            $response = $this->client->request('GET', $uri, [
                'query' => [
                    'filter_exchange_id' => $exchange,
                    'filter_symbol_id' => $symbol,
                ],
            ]);

            return ExchangeRateResultSetFactory::buildFromResponse($response);
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

            return new ExchangeRate($data);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
