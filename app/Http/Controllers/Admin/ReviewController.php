<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function delete(int $id): RedirectResponse
    {
        Review::findOrFail($id)->delete();

        return back();
    }
}
