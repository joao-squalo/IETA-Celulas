<?php

namespace App\Livewire\Users;

use App\Models\Network;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserList extends Component
{
    public $users;
    public function render()
    {
        if (Auth::user()->is_admin) {
            $this->users = User::all();
        } else {
            $churchesIds = Auth::user()->churches()->pluck('id');
            $cellsIds = Auth::user()->cells()->pluck('id');

            $networksFromCells = Auth::user()->cells()
                ->distinct()
                ->pluck('network_id');

            $networksFromChurches = Network::whereIn('church_id', $churchesIds)
                ->pluck('id');

            $networksIds = $networksFromCells
                ->merge($networksFromChurches)
                ->unique()
                ->values();

            $this->users = User::whereHas('networks', function ($query) use ($networksIds) {
                $query->whereIn('networks.id', $networksIds);
            })->orWhereHas('churches', function ($query) use ($churchesIds) {
                $query->whereIn('churches.id', $churchesIds);
            })->orWhereHas('cells', function ($query) use ($cellsIds) {
                $query->whereIn('cells.id', $cellsIds);
            })->get();
        }

        return view('livewire.users.user-list');
    }
}
