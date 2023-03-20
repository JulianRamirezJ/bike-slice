<?php

namespace App\Http\Controllers\User;

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
        $viewData['title'] = "Inventory";
        $viewData['bikes'] = Bike::where('user_id', '=', Auth::id())->get();
        return view('user.bike.showAll')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData['title'] = "Bike";
        $viewData['bike'] = Bike::findOrFail($id);
        return view('user.bike.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData['title'] = "Bike creation";
        return view('user.bike.create')->with("viewData", $viewData);;
    }

    public function update(string $id): View
    {
        $viewData['title'] = "Bike update";
        $viewData['bike'] = Bike::findOrFail($id);
        return view('user.bike.update')->with("viewData", $viewData);;
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        Bike::validateUserUpdate($request);
        $request['share'] = ($request['share'] == '1');
        if ($request->file('image')) {
            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request);
            $request['img'] = $request->file('image')->getClientOriginalName();
            Bike::where('id', $id)->update($request->only(['name', 'share', 'type', 'description', 'img']));
        }else{
            Bike::where('id', $id)->update($request->only(['name', 'share', 'type', 'description']));
        }
        return redirect()->route('user.bike.showAll')->with('status', __('messages.bike_updated_succesfully'));
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
            'stock' => 0,
            'price' => 0,
            'share' => ($input['share'] == '1'),
            'type' => $input['type'],
            'brand' => "nan",
            'img'=> $input['image'],
            'description' => $input['description'],
            'user_id'=> Auth::id(),
        ]);
        return back()->with('status', __('messages.bike_created_succesfully'));
    }

    public function remove(string $id): RedirectResponse
    {
        Bike::findOrFail($id)->delete();
        return redirect()->route('user.bike.showAll');
    }
}