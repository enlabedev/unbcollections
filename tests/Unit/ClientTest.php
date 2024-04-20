<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;


class ClientTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_be_created(): void
    {
        $response = $this->post('/users', [
            'name' => 'Enrique',
            'lastname' => 'Lazo',
            'email' => 'info@enlabedev.com',
            'password' => '12345678',
            'phone' => '+56912345678']
        );
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'info@enlabedev.com']);
    }

    public function test_user_cannot_be_created(): void
    {
        $response = $this->post('/users', [
            'name' => 'Enrique',
            'lastname' => 'Lazo',
            'email' => 'info1enlabedev.com',
            'password' => '12345678',
            'phone' => '+56912345678']
        );
        $response->assertStatus(302);
    }

    public function test_user_can_be_updated(): void
    {
        $user = User::factory()->create();
        $response = $this->put("/users/{$user->id}", [
            'name' => 'Enrique',
            'lastname' => 'Lazo',
            'email' => 'info@enlabedev.com',
            'password' => '12345678',
            'phone' => '+56912345678']
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['email' => 'info@enlabedev.com']);
    }

    public function test_user_cannot_be_updated(): void
    {
        $user = User::factory()->create();
        $response = $this->put("/users/{$user->id}", [
            'name' => 'Enrique',
            'lastname' => 'Lazo',
            'password' => '12345678',
            'phone' => '+56912345678']
        );
        $response->assertStatus(302);
    }

    

}
