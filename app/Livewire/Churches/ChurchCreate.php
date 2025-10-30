<?php

namespace App\Livewire\Churches;

use App\Models\Church;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;


class ChurchCreate extends Component
{
    #[Validate('required', as: 'Nome da Igreja')]
    public $churchName;
    

    public function render()
    {
        return view('livewire.churches.church-create');
    }

    public function save()
    {
        $church = Church::create([
            "name" => $this->churchName
        ]);

        $church->users()->attach(Auth::user());

        return redirect()->route('churches.index');
    }
}
