<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bike;
use App\Models\Part;
use App\Models\Review; 
use App\Models\Assembly; 
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
        $viewData['bike'] = Bike::with('reviews', 'assemblies')->find($id);
        $viewData['title'] = "Bike";
        return view('admin.bike.show')->with("viewData", $viewData);
    }

    public function update(string $id): View
    {
        $viewData['title'] = "Bike update";
        $viewData['bike'] = Bike::findOrFail($id);
        $parts = Part::get();
        $viewData['part_types'] = array(
            'pedal'=>[],
            'chain'=>[],
            'frame'=>[],
            'handlebar'=>[],
            'saddle'=>[],
            'wheel'=>[],
            'chain'=>[],
        );
        foreach($parts as $part){
            $viewData['part_types'][$part->type][] = $part;
        }
        return view('admin.bike.update')->with("viewData", $viewData);
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        Bike::validateAdminUpdate($request);
        $assemblies = Assembly::where('bike_id', $id)->get();
        $parts = [$request['frame'],$request['wheel'],$request['saddle'],$request['chain'],$request['handlebar'],$request['pedal']];
        $request['share'] = ($request['share'] == '1');
        if ($request->file('image')) {
            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request);
            $request['img'] = $request->file('image')->getClientOriginalName();
            Bike::where('id', $id)->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand','description', 'img']));
            foreach($assemblies as $index=>$assembly){
                $part = Part::where('id',$parts[$index])->get();
                $assembly->setPart($part[0]);
                $assembly->save();
            }
        }else{
            Bike::where('id', $id)->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand','description']));
            foreach($assemblies as $index=>$assembly){
                $part = Part::where('id',$parts[$index])->get();
                $assembly->setPart($part[0]);
                $assembly->save();
            }
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
        Assembly::where('bike_id', $id)->delete();
        Bike::findOrFail($id)->delete();
        return redirect()->route('admin.bike.showAll');
    }
}