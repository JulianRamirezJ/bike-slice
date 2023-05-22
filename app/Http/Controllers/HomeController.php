<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Util\WeatherApi;

class HomeController extends Controller
{
    public function index(): View
    {
        $test = new WeatherApi();
        $response = $test->getCurrentWeather();
        return view('home.index')->with('weather', ($response));
    }
}
