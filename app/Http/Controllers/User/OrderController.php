<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        $user = User::find(Auth::id());
        $balance = $user->getBalance();

        $total = 0;
        $cartBikeData = $request->session()->get('cart_bike_data');
        $cartBike = Bike::whereIn('id', array_keys($cartBikeData))->get();
        $total = 0;
        foreach ($cartBike as $key => $value) {
            $total = $total + ($cartBikeData[$value->getId()] * $value->getPrice());
        }

        if ($balance - $total < 0) {
            return back()->with('status', 'balance_problem');
        }

        $order = new Order();
        $order->setTotal($total);
        $order->setAddress($user->getAddress());
        $order->setUserId(Auth::id());
        $order->save();

        foreach ($cartBike as $key => $bike) {
            $item = new Item();
            $item->setOrderId($order->getId());
            $item->setBikeId($bike->getId());
            $item->setQuantity($cartBikeData[$bike->getId()]);
            $item->save();
        }

        $user->setBalance($balance - $total);
        $user->save();

        foreach ($cartBike as $key => $bike) {
            if ($bike->getUser()->getRole() == 'admin') {
                $bike->setStock($bike->getStock() - 1);
                $bike->save();
            } else {
                $min = 2000000;
                $assemblies = $bike->getAssemblies();
                foreach ($assemblies as $key => $assembly) {
                    $part = $assembly->getPart();
                    $part->setStock($part->getStock() - 1);
                    $part->save();
                    if ($part->getStock() < $min) {
                        $min = $part->getStock();
                    }
                }
                $bike->setStock($min);
                $bike->save();
            }
        }

        $request->session()->forget('cart_bike_data');

        return back()->with('status', 'success');
    }
}
