<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Http\Controllers\UserController;

class UserList extends Component
{
    public function delete(User $user) {
        $user->delete();
    }

    public function render(UserController $userController)
    {
        return view('livewire.pages.users.list',[
            'users' => $userController->index()
        ])->layout('layouts.app');
    }
}
