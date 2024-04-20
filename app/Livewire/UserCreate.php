<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserCreate extends Component
{
    #[Rule('required')]
    public $name = '';

    #[Rule('required')]
    public $lastname = '';

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $phone = '';

    #[Rule('required')]
    public $password = '';

    public function save()
    {
        $this->validate();

        $this->password = bcrypt($this->password);

        User::create(
            $this->only(['name', 'lastname', 'email', 'phone', 'password'])
        );

        return redirect()->to('/view/users');
    }

    

    public function render()
    {
        return view('livewire.pages.users.create')
            ->layout('layouts.app');
    }
}
