<?php

namespace App\Livewire\Churches;

use App\Models\Church;
use Livewire\Component;

class ChurchList extends Component
{
    public $churches;
    public function render()
    {
        $this->churches = Church::all();
        return view('livewire.churches.church-list');
    }
}
