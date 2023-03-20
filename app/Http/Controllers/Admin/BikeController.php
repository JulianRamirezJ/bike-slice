<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bike; 
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;
use App\Http\Controllers\Controller;

class BikeController extends Controller
{

    public function showAll(): View
    {
        $viewData['bikes'] = Bike::where('user_id', '=', Auth::id())->get();
        return view('admin.bike.showAll')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData['bike'] = Bike::findOrFail($id);
        return view('admin.bike.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        return view('admin.bike.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Bike::validateUserCreation($request);
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
        return back()->with('status', __('messages.bike_created_succesfully'));;
    }

    public function remove(string $id): RedirectResponse
    {
        Bike::findOrFail($id)->delete();
        return redirect()->route('admin.bike.showAll');
    }
}