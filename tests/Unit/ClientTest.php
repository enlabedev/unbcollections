<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


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
}
