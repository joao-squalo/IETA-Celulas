<?php

namespace App\Livewire\Users;

use App\Models\Network;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class UserList extends Component
{
    public $users;
    public function render()
    {
        if (Auth::user()->is_admin) {
            $this->users = User::all()->sortBy(fn($user) => Str::ascii($user->name))->values();
        } else {
            $churchesIds = Auth::user()->churches()->pluck('id');

            $this->users = User::WhereHas('churches', function ($query) use ($churchesIds) {
                $query->whereIn('churches.id', $churchesIds);
            })->get()->sortBy(fn($user) => Str::ascii($user->name))->values();
        }

        return view('livewire.users.user-list');
    }
}
