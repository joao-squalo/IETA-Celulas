<?php

namespace App\Livewire\Cells;

use App\Models\Cell;
use Livewire\Component;

class CellList extends Component
{
    public $cells;
    public function render()
    {
        $this->cells = Cell::all();
        return view('livewire.cells.cell-list');
    }
}
