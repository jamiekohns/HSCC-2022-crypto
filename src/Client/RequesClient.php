<?php

namespace Crypto\Client;

use GuzzleHttp\Client;

/**
 * From: https://reqres.in/api/users
 */
class RequesClient extends Client
{
    public function __construct()
    {
        parent::__construct([
            'base_uri' => 'https://reqres.in/api/',
        ]);
    }
}
