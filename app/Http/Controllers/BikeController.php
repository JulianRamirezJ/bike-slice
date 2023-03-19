<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bike; 
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;

class BikeController extends Controller
{

    public function showAll(): View
    {
        $viewData['bikes'] = Bike::where('user_id', '=', Auth::id())->get();
        return view('user.bike.showAll')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData['bike'] = Bike::findOrFail($id);
        return view('user.bike.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        return view('user.bike.create');
    }

    public function save(Request $request): View
    {
        Bike::validateCreation($request);
        $input = $request->all();
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        $input['image'] = $request->file('image')->getClientOriginalName();
        Bike::create([
            'name' => $input['name'],
            'stock' => $input['stock'],
            'price' => $input['price'],
            'share' => ($input['share'] == '1'),
            'type' => $input['type'],
            'brand' => $input['brand'],
            'img'=> $input['image'],
            'description' => $input['description'],
            'user_id'=> Auth::id(),
        ]);
        return view('user.bike.success');
    }

    public function remove(string $id): RedirectResponse
    {
        $bike = Bike::findOrFail($id);
        $bike->delete();
        return redirect("/user/showAll");
    }
}