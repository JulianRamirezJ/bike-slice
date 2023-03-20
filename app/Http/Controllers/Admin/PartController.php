<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Part; 
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

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
            'stock' => 0,
            'price' => 0,
            'type' => $input['type'],
            'brand' => "0",
            'img'=> $input['image'],
            'share' => ($input['share'] == '1'),
        ]);
        return back()->with('status', __('messages.created_succesfully'));;
    }

    public function remove(string $id): RedirectResponse
    {
        Part::findOrFail($id)->delete();
        return redirect("/admin/part");
    }
}