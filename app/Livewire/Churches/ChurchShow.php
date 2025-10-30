<?php

namespace App\Livewire\Churches;

use Livewire\Attributes\Validate; 
use App\Models\Church;
use Livewire\Component;

class ChurchShow extends Component
{
    public Church $church;

    #[Validate('required')] 
    public $churchName;

    public function mount(Church $church)
    {
        $this->church = $church;
        $this->churchName = $church->name;
    }

    public function render()
    {
        return view('livewire.churches.church-show');
    }

    public function save(){
        $church = $this->church;
        $church->name = $this->churchName;
        $church->save();

        return redirect()->route('churches.index');
    }
}
