<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bike; 
use App\Models\Part; 
use App\Models\Assembly; 
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

    public function show(string $id, Request $request): View
    {
        $cartBikeData = $request->session()->get('cart_bike_data');
        $viewData['isInCart'] = false;
        if($cartBikeData){  
            $viewData['isInCart'] = array_key_exists($id, $cartBikeData);
        }
        $viewData['title'] = "Bike";
        $viewData['bike'] = Bike::with('reviews', 'assemblies')->find($id);
        if(Auth::id() == null) {
            $viewData['user_id'] = 0;
        }else{
            $viewData['user_id'] = Auth::id();
        }
        return view('user.bike.show')->with("viewData", $viewData);
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
        return view('user.bike.update')->with("viewData", $viewData);
        
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        Bike::validateUserUpdate($request);
        $assemblies = Assembly::where('bike_id', $id)->get();
        $parts = [$request['frame'],$request['wheel'],$request['saddle'],$request['chain'],$request['handlebar'],$request['pedal']];
        $price = 0;
        $stock = 10000;
        foreach($parts as $part){
            $p = Part::where('id', $part)->get();
            $price += $p[0]->getPrice();
            if($stock > $p[0]->getStock()){
                $stock = $p[0]->getStock();
            }
        }
        $request['price'] = $price;
        $request['stock'] = $stock;
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
        return redirect()->route('user.bike.showAll')->with('status', __('messages.bike_updated_succesfully'));
    }

    public function create(): View
    {
        $viewData['title'] = "Bike creation";
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
        return view('user.bike.create')->with("viewData", $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Bike::validateUserCreation($request);
        $input = $request->all();
        $parts = [$input['frame'],$input['wheel'],$input['saddle'],$input['chain'],$input['handlebar'],$input['pedal']];
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        $input['image'] = $request->file('image')->getClientOriginalName();
        $price = 0;
        $stock = 10000;
        foreach($parts as $part){
            $p = Part::where('id', $part)->get();
            $price += $p[0]->getPrice();
            if($stock > $p[0]->getStock()){
                $stock = $p[0]->getStock();
            }
        }
        $Bike = Bike::create([
            'name' => $input['name'],
            'stock' => $stock,
            'price' => $price,
            'share' => ($input['share'] == '1'),
            'type' => $input['type'],
            'brand' => "Parts",
            'img'=> $input['image'],
            'description' => $input['description'],
            'user_id'=> Auth::id(),
        ]);
        $id = $Bike->id;
        //Create assembly for each part
        foreach($parts as $part){
            Assembly::create([
                'bike_id' => $id,
                'part_id' => $part
            ]);
        }
        return back()->with('status', __('messages.bike_created_succesfully'));
    }

    public function remove(string $id): RedirectResponse
    {
        Assembly::where('bike_id', $id)->delete();
        Bike::findOrFail($id)->delete();
        return redirect()->route('user.bike.showAll');
    }
}