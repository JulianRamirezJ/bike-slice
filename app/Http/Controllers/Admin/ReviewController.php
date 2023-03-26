<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review; 
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{

    public function delete(int $id): RedirectResponse
    {
        Review::findOrFail($id)->delete();
        return back();
    }

}