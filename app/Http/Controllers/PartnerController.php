<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Util\NeotechApi;

class PartnerController extends Controller
{
    public function index(): View
    {
        $neotechApi = new NeotechApi();
        $response = $neotechApi->getNeotechComputers();
        return view('partner.index')->with('computers', ($response));
    }
}
