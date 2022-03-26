<?php

namespace Crypto\Repository;

use Crypto\Client\WeatherClient;
use GuzzleHttp\Client;

class WeatherRepository 
{
    /**
     * The weather API location woeid for Atlanta, GA
     */
    const LOCATION_ATLANTA = 2357024;

    /**
     * @var WeatherClient $client
     */
    private $client;

    /**
     * WeatherRepository constructor
     * NOTE the type declaration of the $client!!!
     * 
     * @param WeatherClient $client a Guzzle WeatherClient
     */
    public function __construct(WeatherClient $client = null)
    {
        // if no client was provided, create one
        if (!$client) {
            $client = new WeatherClient();
        }

        $this->client = $client;
    }

    /**
     * Get the weather for a given location
     * 
     * @param mixed $locationId the woeid from https://www.metaweather.com/api/#location
     */
    public function getWeather($locationId = null)
    {
        if (!$locationId) {
            $locationId = self::LOCATION_ATLANTA;
        }

        try {
            $uri = sprintf('location/%s', $locationId);
            $response = $this->client->request('GET', $uri);
            
            $data = json_decode($response->getBody()->getContents(), true);

            return $data;
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }

        return [];
    }
}
