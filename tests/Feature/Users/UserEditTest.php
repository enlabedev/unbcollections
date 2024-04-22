<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use App\Http\Requests\UserRequest;
use App\Livewire\Users\UserEdit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UserEditTest extends TestCase
{
    use RefreshDatabase;

    public function test_save_method_calls_user_controller_update()
    {
        $user = User::factory()->create();

        $userController = $this->partialMock(UserController::class);
        $userController->expects('update')->once();

        Livewire::test(UserEdit::class, ['user' => $user])
            ->set('name', 'New Name')
            ->set('lastname', 'New Lastname')
            ->set('email', 'newemail@example.com')
            ->set('phone', '1234567890')
            ->set('password', 'newpassword')
            ->call('save', $userController);
    }
}
?>