<?php

namespace App\Livewire\Users;

use App\Mail\UserInviteMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
        $password = random_int(100000, 999999);
        $user = new User([
            "name" => $this->name,
            "email" => $this->email,
            "password" => bcrypt($password)
        ]);

        $user->save();

        Mail::to($user->email)->send(new UserInviteMail($user, $password));
        return redirect()->route('users.index');
    }
}
