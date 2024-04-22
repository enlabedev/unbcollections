<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Http\Controllers\UserController;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserEdit extends Component
{
    public $user;
    public $name = '';
    public $lastname = '';
    public $email = '';
    public $phone = '';
    public $password = '';

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->user->password = '';
        
    }

    public function save(UserController $userController)
    {
        $userController->update(new UserRequest([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ]), $this->user->id);
    }

    public function render()
    {
        return view('livewire.pages.users.edit')
            ->layout('layouts.app');
    }
}
