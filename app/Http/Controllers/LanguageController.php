<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang(Request $request) : RedirectResponse
    {
        $locale = $request->locale ?? 'en';
        $request->session()->put('locale', $locale);
        return redirect()->back();
    }
}
