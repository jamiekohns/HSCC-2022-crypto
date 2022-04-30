<?php

namespace Crypto\ResultSet;

use Crypto\Model\RequesUser;
use GuzzleHttp\Psr7\Response;
use Crypto\Model\ExchangeRate;
use Crypto\ResultSet\RequesUsersResultSet;

class RequesUsersResultSetFactory
{
    public static $class = RequesUser::class;

    public static function buildFromResponse(Response $response): RequesUsersResultSet
    {
        $resultData = json_decode($response->getBody()->getContents(), true);

        $items = [];
        foreach ($resultData['data'] as $item) {
            try {
                $model = new self::$class($item);
                $items[] = $model;
            } catch (\Exception $e) {
                // error handling?
            }
        }

        $resultSet = new RequesUsersResultSet(
            $items,
            $resultData['page'], 
            $resultData['per_page'], 
            $resultData['total'],
            $resultData['total_pages']
        );

        return $resultSet;
    }
}
