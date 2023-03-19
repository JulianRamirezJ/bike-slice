<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): void
    {
        if ($request->hasFile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            Storage::disk('public')->put(
                $image_name,
                file_get_contents($request->file('image')->getRealPath())
            );
        }
    }
}
