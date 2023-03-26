<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bike;
use App\Models\Review; 
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;
use App\Http\Controllers\Controller;

class BikeController extends Controller
{

    public function showAll(): View
    {
        $viewData['bikes'] = Bike::all();
        $viewData['title'] = "Inventory";
        return view('admin.bike.showAll')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData['bike'] = Bike::with('reviews')->find($id);
        $viewData['title'] = "Bike";
        return view('admin.bike.show')->with("viewData", $viewData);
    }

    public function update(string $id): View
    {
        $viewData['title'] = "Bike update";
        $viewData['bike'] = Bike::findOrFail($id);
        return view('admin.bike.update')->with("viewData", $viewData);;
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        Bike::validateAdminUpdate($request);
        $request['share'] = ($request['share'] == '1');
        if ($request->file('image')) {
            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request);
            $request['img'] = $request->file('image')->getClientOriginalName();
            Bike::where('id', $id)->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand','description', 'img']));
        }else{
            Bike::where('id', $id)->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand','description']));
        }
        return redirect()->route('admin.bike.showAll')->with('status', __('messages.bike_updated_succesfully'));
    }

    public function create(): View
    {
        $viewData['title'] = "Bike creation";
        return view('admin.bike.create')->with("viewData", $viewData);;
    }

    public function save(Request $request): RedirectResponse
    {
        Bike::validateAdminCreation($request);
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

    public function deleteReview(int $id): RedirectResponse
    {
        Review::findOrFail($id)->delete();
        return back();
    }
}