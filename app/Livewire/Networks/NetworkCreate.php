<?php

namespace App\Livewire\Networks;

use App\Models\Network;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NetworkCreate extends Component
{
    #[Validate('required', as: 'Nome da Rede')]
    public $name;

    #[Validate('required', as: 'Cor')]
    public $color;

    #[Validate('required', as: 'Igreja')]
    public $churchID = null;

    public $churches;

    public function mount(){
        $this->churches = Auth::user()->churches;
    }

    public function render()
    {
        return view('livewire.networks.network-create');
    }

    public function save()
    {
        $network = new Network([
            "name" => $this->name,
            "color" => $this->color
        ]);

        $network->church()->associate($this->churchID);
        $network->save();

        $network->users()->syncWithoutDetaching(Auth::user());
        return redirect()->route('networks.index');
    }
}
