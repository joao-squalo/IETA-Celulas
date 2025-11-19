<?php

namespace App\Livewire\Networks;

use App\Models\Network;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NetworkShow extends Component
{
    public Network $network;

    #[Validate('required', as: 'Nome da Rede')]
    public $name;

    #[Validate('required', as: 'Cor')]
    public $color;

    #[Validate('required', as: 'Igreja')]
    public $churchID = null;

    public $churches;

    public bool $isOpen = false;

    #[Validate('required', as: 'Email')]
    public $userMail;

    public function mount(Network $network)
    {
        $this->churches = Auth::user()->churches;

        $this->network = $network;
        $this->name = $network->name;
        $this->color = $network->color;

        $this->churchID = $network->church->id;
    }

    public function render()
    {
        return view('livewire.networks.network-show');
    }

    public function save()
    {
        $network = $this->network;
        $network->name = $this->name;
        $network->color = $this->color;
        $network->church()->associate($this->churchID);
        $network->save();

        return redirect()->route('networks.index');
    }

     public function add()
    {
        $user = User::where("email", $this->userMail)->first();

        if ($user == null) {
            $this->addError('userMail', 'Usuário não encontrado.');
            return;
        }

        $user->networks()->syncWithoutDetaching($this->network);
        $this->userMail = '';
        $this->isOpen = false;
    }

    public function remove($id)
    {
        $user = User::find($id);

        $user->networks()->detach($this->network);
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
