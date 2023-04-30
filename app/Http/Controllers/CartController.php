<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['cartBike'] = [];
        $viewData['total'] = 0;
        $cartBikeData = $request->session()->get('cart_bike_data');
        if ($cartBikeData) {
            $cartBike = Bike::whereIn('id', array_keys($cartBikeData))->get();
            $total = 0;
            foreach ($cartBike as $key => $value) {
                $total = $total + ($cartBikeData[$value->getId()] * $value->getPrice());
            }
            $viewData['cartBike'] = $cartBike;
            $viewData['total'] = $total;
        }

        $viewData['title'] =  __('messages.Cart');
        $viewData['cartBikeData'] = $cartBikeData;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartBikeData = $request->session()->get('cart_bike_data');
        if ($cartBikeData && array_key_exists($id, $cartBikeData)) {
            $cartBikeData[$id] = $cartBikeData[$id] + 1;
        } else {
            $cartBikeData[$id] = 1;
        }
        $request->session()->put('cart_bike_data', $cartBikeData);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_bike_data');

        return back();
    }

    public function remove(string $id, Request $request): RedirectResponse
    {
        $cartBikeData = $request->session()->get('cart_bike_data');
        if (array_key_exists($id, $cartBikeData)) {
            if ($cartBikeData[$id] === 1) {
                unset($cartBikeData[$id]);
            } else {
                $cartBikeData[$id] = $cartBikeData[$id] - 1;
            }
        }
        $request->session()->put('cart_bike_data', $cartBikeData);

        return back();
    }
}
