<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use App\Models\Part; 
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
<<<<<<< HEAD
use Illuminate\Support\Facades\Redirect;
=======
>>>>>>> c6eb92d99e70295a75e3a8a7b9c2042bc8e78e2a
use App\Http\Controllers\Controller;

class PartController extends Controller
{
    public static $type_options = ['chain', 'pedal', 'frame', 'handlebar', 'saddle', 'wheel'];

    public function showAll(): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.view_parts');
        $viewData['parts'] = Part::all();
        return view('user.part.showAll')->with("viewData", $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        try {
            $viewData = [];
            $viewData['part'] = Part::findOrFail($id);
            $viewData["type_options"] = PartController::$type_options;
            $viewData['title'] =  __('messages.show_part');
            return view('user.part.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }
}