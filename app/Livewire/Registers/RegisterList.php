<?php

namespace App\Livewire\Registers;

use App\Models\Cell;
use App\Models\Network;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterList extends Component
{
    public $registers = [];
    public function render()
    {
        if (Auth::user()->is_admin) {
            $this->registers = Register::all();
        } else {
            $networksIds = Auth::user()->networks()->pluck('id');

            $allCellsIds = Cell::whereIn('network_id', $networksIds)->pluck('id')->merge(Auth::user()->cells()->pluck('id'))
                ->unique()
                ->values();

            $this->registers = Register::whereIn('cell_id', $allCellsIds)
                ->get()
                ->merge(Auth::user()->registers ?? collect())
                ->unique('id')
                ->values();
        }


        return view('livewire.registers.register-list');
    }
}
