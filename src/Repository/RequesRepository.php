<?php

namespace Crypto\Repository;

use GuzzleHttp\Client;
use Crypto\Client\RequesClient;
use Crypto\Model\RequesUser;
use Crypto\Repository\Repository;
use Crypto\ResultSet\RequesUsersResultSetFactory;

class RequesRepository extends Repository
{

    /**
     * @var RequesClient $client
     */
    private $client;

    /**
     * RequesRepository constructor
     * NOTE the type declaration of the $client!!!
     * 
     * @param RequesClient $client a Guzzle RequesClient
     */
    public function __construct(RequesClient $client = null)
    {
        // if no client was provided, create one
        if (!$client) {
            $client = new RequesClient();
        }

        $this->client = $client;
    }

    public function getUsers($page = 1)
    {
        try {
            $uri = sprintf('users?page=%d', $page);
            $response = $this->client->request('GET', $uri);

            return RequesUsersResultSetFactory::buildFromResponse($response);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function getUser($userId)
    {
        try {
            $uri = sprintf('users/%d', $userId);
            $response = $this->client->request('GET', $uri);
            $data = json_decode($response->getBody()->getContents(), true);

            return new RequesUser($data['data']);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
