<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Review; 
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function create(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.title_create');
        $viewData['bike_id'] = $id;
        return view('user.review.create')->with('viewData', $viewData);;
    }

    public function save(Request $request, int $id): RedirectResponse
    {
        Review::validate($request);
        //$review = new Review();
        //Review::create($request->only(["stars","description", Auth::id(), $id]));
        $input = $request->all();
        $review = Review::create([
            'stars' => $input['stars'],
            'description' => $input['description'],
            'bike_id' => $id,
            'user_id' => Auth::id(),
        ]);
        $viewData['title'] = 'Sucessfully created';
        return redirect()->route('user.bike.show', ['id' => $id]);
    }

    
    public function delete(int $id): RedirectResponse
    {
        Review::find($id)->delete();
        return back();
    }

}