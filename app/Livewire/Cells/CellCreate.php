<?php

namespace App\Livewire\Cells;

use App\Models\Cell;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CellCreate extends Component
{
    #[Validate('required', as: 'Nome da Célula')]
    public $name;

    #[Validate('required', as: 'Rede')]
    public $networkID = null;

    public $networks;

    public function mount()
    {
        $this->networks = Auth::user()->networks;
    }


    public function render()
    {
        return view('livewire.cells.cell-create');
    }

        public function save()
    {
        $cell = new Cell([
            "name" => $this->name
        ]);

        $cell->network()->associate($this->networkID);
        $cell->save();

        $cell->users()->syncWithoutDetaching(Auth::user());
        return redirect()->route('cells.index');
    }
}
