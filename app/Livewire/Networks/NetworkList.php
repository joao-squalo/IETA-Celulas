<?php

namespace App\Livewire\Networks;

use App\Models\Network;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NetworkList extends Component
{
    public $networks;
    public function render()
    {
        if (Auth::user()->is_admin)
            $this->networks = Network::all();
        else
            $this->networks = Auth::user()->networks;

        return view('livewire.networks.network-list');
    }
}
