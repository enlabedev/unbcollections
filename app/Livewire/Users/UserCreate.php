<?php

namespace App\Livewire\Users;

use App\Http\Controllers\UserController;
use Livewire\Component;
use App\Http\Requests\UserRequest;

class UserCreate extends Component
{
    public $name = '';
    public $lastname = '';
    public $email = '';
    public $phone = '';
    public $password = '';

    protected $userController;

    public function save(UserController $userController)
    {
        $userController->store(new UserRequest([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ]));
    }

    public function render()
    {
        return view('livewire.pages.users.create')->layout('layouts.app');
    }
}
