<?php

namespace App\Http\Livewire\Bikes;

use App\Models\Bike;
use Livewire\Component;

class SearchBike extends Component
{
    public $search = '';

    public function render()
    {
        $viewData = [];
        $viewData['bikes'] = [];
        if (! empty($this->search)) {
            $viewData['bikes'] = Bike::where('name', 'LIKE', '%'.$this->search.'%')
                                ->orWhere('brand', 'LIKE', '%'.$this->search.'%')
                                ->get();
        } else {
            $viewData['bikes'] = Bike::all();
        }

        return view('livewire.bikes.search-bike')->with('viewData', $viewData);
    }
}
