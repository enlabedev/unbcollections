<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Rule;

class UserEdit extends Component
{
    public User $user;

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

    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->user->password = '';
        
    }

    public function save()
    {
        $this->validate();

        if ($this->password) {
            $this->user->password = bcrypt($this->password);
        }

        $this->user->update(
            $this->only(['name', 'lastname', 'email', 'phone', 'password'])
        );

        return redirect()->to('/view/users');
    }

    public function render()
    {
        return view('livewire.pages.users.edit')
            ->layout('layouts.app');
    }
}
