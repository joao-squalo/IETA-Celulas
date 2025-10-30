<?php

namespace App\Livewire\Churches;

use Livewire\Attributes\Validate; 
use App\Models\Church;
use Livewire\Component;

class ChurchShow extends Component
{
    public Church $church;

    #[Validate('required',as: 'Nome da Igreja')] 
    public $churchName;

    #[Validate('required|email',as: 'Email')] 
    public $userMail;

    public bool $isOpen = false;

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

    public function addAdmin(){

    }

     public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
