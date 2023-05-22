<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class WeatherApi 
{
    public function getCurrentWeather(): string
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&hourly=temperature_2m&current_weather=true&forecast_days=1";
        $response = $client->request('GET', $url);

        $response = json_decode($response->getBody(), true);
        return $response = ($response["current_weather"]["temperature"]);
    }
}
