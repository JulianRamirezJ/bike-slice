<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Util\NeotechApi;

class PartnerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $neotechApi = new NeotechApi();
        $response = $neotechApi->getNeotechComputers();
        $viewData["computers"] = $response; 
        return view('partner.index')->with('viewData', ($viewData));
    }
}
