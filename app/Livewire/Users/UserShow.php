<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class UserShow extends Component
{
    public User $user;

    #[Validate('required', as: 'Nome Completo')]
    public $name;

    #[Validate('required', as: 'E-mail')]
    public $email;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.users.user-show');
    }

    public function save()
    {
        $user = $this->user;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        return redirect()->route('users.index');
    }
}
