<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;


class RoleTest extends TestCase
{
    public function test_user_security(): void
    {
        $response = $this->get('/user');
        $response->assertRedirect('/');
    }
    public function test_user_security_with_log_in_as_user(): void
    {
        $user = User::create([
            'name' => 'Test name',
            'email' => 'testemail2@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'address' => 'Calle 1',
            'balance' => 1000,
        ]);

        $this->actingAs($user);
        $response = $this->get('/user');
        $user->delete();
        $response->assertStatus(200);
    }
    public function test_admin_security_with_log_in_as_admin(): void
    {
        $user = User::create([
            'name' => 'Test name',
            'email' => 'testemail2@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'address' => 'Calle 1',
            'balance' => 1000,
        ]);

        $this->actingAs($user);
        $response = $this->get('/admin');
        $user->delete();
        $response->assertStatus(200);
    }
    public function test_admin_security_with_log_in_as_user(): void
    {
        $user = User::create([
            'name' => 'Test name',
            'email' => 'testemail2@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'address' => 'Calle 1',
            'balance' => 1000,
        ]);

        $this->actingAs($user);
        $response = $this->get('/admin');
        $user->delete();
        $response->assertRedirect('/');
    }
}
