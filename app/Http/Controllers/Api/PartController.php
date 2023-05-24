<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\JsonResponse;


class PartController extends Controller
{
    public function showAll():JsonResponse
    {
        return response()->json(Part::all());
    }

    public function show(string $id):JsonResponse
    {
        return response()->json(Part::find($id));
    }
}