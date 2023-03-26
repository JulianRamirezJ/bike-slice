<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Bike; 

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }
}
