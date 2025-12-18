<?php

namespace App\Livewire\Registers;

use App\Models\Register;
use Livewire\Component;

class RegisterList extends Component
{
    public $registers;
    public function render()
    {
        $this->registers = Register::all();
        return view('livewire.registers.register-list');
    }
}
