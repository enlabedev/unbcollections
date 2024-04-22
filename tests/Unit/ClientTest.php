<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;


class ClientTest extends TestCase
{
    use RefreshDatabase;

    protected $user = [
        'name' => 'Enrique',
        'lastname' => 'Lazo',
        'email' => 'info@enlabedev.com',
        'password' => '12345678',
        'phone' => '+56912345678'];
    
    public function test_user_can_be_created(): void
    {
        $response = $this->post('/users', $this->user);
        $response->assertStatus(201);
        $user = $response->json();
        $find = User::find($user['id']);
        $this->assertEquals($this->user["email"], $find->email);
        
    }

    public function test_user_cannot_be_created(): void
    {
        $user = $this->user;
        unset($user['email']);
        $response = $this->post('/users', $user);
        $response->assertStatus(302);
    }

    public function test_user_can_be_updated(): void
    {
        $user = User::factory()->create();
        $response = $this->put("/users/{$user->id}", $this->user);
        $response->assertStatus(200);
        $user = $response->json();
        $find = User::find($user['id']);
        $this->assertEquals($this->user["email"], $find->email);
    }

    public function test_user_cannot_be_updated(): void
    {

        $user = User::factory()->create();
        $user_updated = $this->user;
        unset($user_updated['email']);
        $response = $this->put("/users/{$user->id}", $user_updated);
        $response->assertStatus(302);
    }

    public function test_user_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $response = $this->delete("/users/{$user->id}");
        $response->assertStatus(204);
        $this->assertSoftDeleted('users', ['id' => $user->id]);
    }


    public function test_user_cannot_be_deleted(): void
    {
        $response = $this->delete("/users/999");
        $response->assertStatus(404);
    }

    /* public function test_user_can_be_listed(): void
    {
        User::factory()->count(5)->create();
        $response = $this->get('/users');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    public function test_user_can_be_shown(): void
    {
        User::all()->each->delete();
        $user = User::factory()->create();
        $response = $this->get("/users/{$user->id}");
        $response->assertStatus(200);
    } */

}
