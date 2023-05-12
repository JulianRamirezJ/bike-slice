<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Part;


class PartController extends Controller
{
    public function showAll()
    {
        return Part::all();
    }

    public function show(string $id)
    {
        return Part::find($id);
    }
}