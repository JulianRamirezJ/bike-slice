<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Part; 
use App\Models\Assembly; 
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class PartController extends Controller
{
    public static $type_options = ['chain', 'pedal', 'frame', 'handlebar', 'saddle', 'wheel'];

    public function showAll(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.view_parts');
        $viewData['parts'] = Part::all();
        return view('admin.part.showAll')->with("viewData", $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        try {
            $viewData = [];
            $viewData['part'] = Part::findOrFail($id);
            $viewData["type_options"] = PartController::$type_options;
            $viewData['title'] =  __('messages.show_part');
            return view('admin.part.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] =  __('messages.create_parts');
        return view('admin.part.create')->with("viewData", $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Part::validateCreation($request);
        $input = $request->all();
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        $input['image'] = $request->file('image')->getClientOriginalName();
        Part::create([
            'name' => $input['name'],
            'stock' => $input['stock'],
            'price' => $input['price'],
            'type' => $input['type'],
            'brand' => $input['brand'],
            'img'=> $input['image']
        ]);
        return back()->with('status', __('messages.created_succesfully'));;
    }

    public function update(string $id, Request $request)
    {
        $part = Part::findorfail($id);
        Part::validateUpdate($request);
        $old_price = $part->getPrice();
        $new_price = $request['price'];
        $asemblies = Assembly::where('part_id', $part->getId())->get();
        foreach($asemblies as $assembly){
            $bike = $assembly->getBike();
            $bike->setPrice($bike->getPrice() - $old_price + $new_price);
            if($bike->getStock() > $request['stock']){
                $bike->setStock($request['stock']);
            }
            $bike->save();
        }
        if ($request->file('image')) {
            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request);
            $request['img'] = $request->file('image')->getClientOriginalName();
            Part::where('id', $id)->update($request->only(['name', 'price', 'stock', 'type', 'brand', 'img']));
        }else{
            Part::where('id', $id)->update($request->only(['name', 'price', 'stock', 'type', 'brand']));
        }
        return back()->with('status', 'updated');;
    }

    public function remove(string $id): RedirectResponse
    {
        Part::findOrFail($id)->delete();
        return redirect("/admin/part");
    }
}