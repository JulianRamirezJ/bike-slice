<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('user.index');
    }

    public function config(): View
    {
        $viewData['user'] = Auth::user();

        return view('user.config.configuration')->with('viewData', $viewData);
    }

    public function updateConfig(Request $request): RedirectResponse
    {
        User::validateUpdate($request);
        if ($request->password == null) {
            Auth::user()->update([
                'name' => $request->name,
                'email' => $request->email,
                'balance' => $request->balance,
                'address' => $request->address,
                'updated_at' => now(),
            ]);
        } else {
            Auth::user()->update([
                'name' => $request->name,
                'email' => $request->email,
                'balance' => $request->balance,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('user.conf')->with('status', __('messages.user_updated'));
    }
}
