<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Validate;

class UserCreate extends Component
{
    #[Validate('required', as: 'Nome Completo')]
    public $name;

    #[Validate('required', as: 'E-mail')]
    public $email;

    public function render()
    {
        return view('livewire.users.user-create');
    }

    public function save()
    {
        $church = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => bcrypt(Str::random(5))
        ]);

        return redirect()->route('users.index');
    }
}
