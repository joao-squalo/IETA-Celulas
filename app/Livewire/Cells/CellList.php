<?php

namespace App\Livewire\Cells;

use App\Models\Cell;
use App\Models\Network;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CellList extends Component
{
    public $cells;
    public function render()
    {
        if (Auth::user()->is_admin) {
            $this->cells = Cell::all();
        } else {
            $churchesIds = Auth::user()->churches()->pluck('id');
            $networksIds = Auth::user()->networks()->pluck('id');

            $churchNetworks = Network::whereIn('church_id', $churchesIds)->pluck('id');

            $allNetworkIds = $networksIds
                ->merge($churchNetworks)
                ->unique()
                ->values();

            $this->cells = Cell::whereIn('network_id', $allNetworkIds)->get()->merge(Auth::user()->cells)->unique('id')
                ->values();
        }

        return view('livewire.cells.cell-list');
    }
}
