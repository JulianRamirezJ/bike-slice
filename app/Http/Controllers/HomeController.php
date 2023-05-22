<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Util\WeatherApi;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $test = new WeatherApi();
        $response = $test->getCurrentWeather();
        $viewData["temperature"] = $response['temperature'];
        $viewData["time"] = $response['time'];
        $viewData["weather"] = $response['weathercode'];
        $viewData["day"] = $response['is_day'];
        return view('home.index')->with('viewData', $viewData);
    }
}
