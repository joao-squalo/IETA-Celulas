<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public $users;
    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.user-list');
    }
}
