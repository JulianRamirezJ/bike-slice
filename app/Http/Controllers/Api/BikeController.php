<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Bike;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request; 

class BikeController extends Controller
{
    public function showAll()
    {
        return Bike::all();
    }

    public function show(string $id)
    {
        return Bike::find($id);
    }
}