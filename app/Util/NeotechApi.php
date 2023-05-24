<?php

namespace App\Util;

use GuzzleHttp\Client;

class NeotechApi
{
    public function getNeotechComputers(): array
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = env('HOST_NEOTECH') . "computers";
        $response = $client->request('GET', $url);
        $response = json_decode($response->getBody(), true);
        return $response;
    }
}