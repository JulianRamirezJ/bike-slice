<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Bike; 

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData['bikes'] = Bike::all();
        return view('home.index')->with("viewData", $viewData);;
    }
}
