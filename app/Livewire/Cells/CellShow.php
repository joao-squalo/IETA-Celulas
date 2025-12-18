<?php

namespace App\Livewire\Cells;

use App\Models\Cell;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CellShow extends Component
{
    public Cell $cell;

    #[Validate('required', as: 'Nome da Célula')]
    public $name;

    #[Validate('required', as: 'Rede')]
    public $networkID = null;

    public $networks;

    public bool $isOpen = false;

    #[Validate('required', as: 'Email')]
    public $userMail;

    public function mount(Cell $cell)
    {
        $this->networks = Auth::user()->networks;

        $this->cell = $cell;
        $this->name = $cell->name;
        $this->networkID = $cell->network->id;
    }

    public function render()
    {
        return view('livewire.cells.cell-show');
    }
    public function save()
    {
        $cell = $this->cell;
        $cell->name = $this->name;
        $cell->network()->associate($this->networkID);
        $cell->save();

        return redirect()->route('cells.index');
    }

    public function add()
    {
        $user = User::where("email", $this->userMail)->first();

        if ($user == null) {
            $this->addError('userMail', 'Usuário não encontrado.');
            return;
        }

        $user->cells()->syncWithoutDetaching($this->cell);
        $this->userMail = '';
        $this->isOpen = false;
    }

    public function remove($id)
    {
        $user = User::find($id);

        $user->cells()->detach($this->cell);
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->userMail = '';
        $this->resetErrorBag();
        $this->isOpen = false;
    }
}
