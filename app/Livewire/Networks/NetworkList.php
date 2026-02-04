<?php

namespace App\Livewire\Networks;

use App\Models\Network;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class NetworkList extends Component
{
    public $networks;
    public function render()
    {
        if (Auth::user()->is_admin)
            $this->networks = Network::all()->sortBy(fn($network) => Str::ascii($network->name))->values();
        else {
            $this->networks = Network::whereIn(
                'church_id',
                Auth::user()->churches()->pluck('id')
            )->get()->sortBy(fn($network) => Str::ascii($network->name))->values();
        }


        return view('livewire.networks.network-list');
    }
}
