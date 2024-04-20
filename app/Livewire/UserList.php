<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public function delete(User $user) {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.pages.users.list',[
            'users' => User::all()
        ])->layout('layouts.app');
    }
}
