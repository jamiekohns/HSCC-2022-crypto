<?php

namespace Crypto\ResultSet;

use GuzzleHttp\Psr7\Response;
use Crypto\Model\ExchangeRate;
use Crypto\ResultSet\ExchangeRateResultSet;

class ExchangeRateResultSetFactory
{
    private static $class = ExchangeRate::class;

    public static function buildFromResponse(Response $response): ExchangeRateResultSet
    {
        $resultData = json_decode($response->getBody()->getContents(), true);

        $resultSet = new ExchangeRateResultSet();
        foreach ($resultData as $item) {
            try {
                $resultSet[] = new self::$class($item);
            } catch (\Exception $e) {
                // error handling?
            }
        }

        return $resultSet;
    }
}