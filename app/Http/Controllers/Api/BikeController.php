<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Bike;
use Illuminate\Support\Facades\DB;

use App\Models\Review;

class BikeController extends Controller
{
    public function showAll()
    {
        $bikes = Bike::all()->map(function ($bike) {
            $bike->url = "http://bike-slice.shop/user/bike/show/".$bike->getId();
            return $bike;
        });
        
        return response()->json($bikes, 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function show(string $id)
    {
        return Bike::find($id);
    }

    public function showTop(int $to)
    {
        $bikes = Bike::select('bikes.*', DB::raw('AVG(reviews.stars) as average_score'))
            ->join('reviews', 'reviews.bike_id', '=', 'bikes.id')
            ->groupBy('bikes.id')
            ->orderByDesc('average_score')
            ->limit($to)
            ->get();
            
        $bikes->map(function ($bike) {
            $bike->url = "http://bike-slice.shop/user/bike/show/".$bike->getId();
            return $bike;
        });

        return response()->json($bikes, 200, [], JSON_UNESCAPED_SLASHES);
    }
}