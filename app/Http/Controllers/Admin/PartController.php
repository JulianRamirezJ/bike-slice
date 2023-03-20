<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Part; 
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Redirect;

class PartController extends Controller
{

    public function showAll(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.view_parts');
        $viewData['parts'] = Part::all();
        return view('admin.part.showall')->with("viewData", $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        try {
            $viewData = [];
            $viewData['part'] = Part::findOrFail($id);
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

    public function remove(string $id): RedirectResponse
    {
        Part::findOrFail($id)->delete();
        return redirect("/admin/part");
    }
}