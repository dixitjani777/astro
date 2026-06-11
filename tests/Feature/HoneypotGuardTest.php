<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HoneypotGuardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_is_allowed_when_the_honeypot_field_is_empty(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin-login-allowed@example.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
        ]);

        $response = $this->post(route('admin.login.post'), [
            'email' => $admin->email,
            'password' => 'admin12345',
            'website' => '',
            'hp_time' => time(),
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_login_is_blocked_when_the_honeypot_field_is_filled(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin-login-blocked@example.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
        ]);

        $response = $this->from(route('admin.login'))->post(route('admin.login.post'), [
            'email' => $admin->email,
            'password' => 'admin12345',
            'website' => 'https://example.com',
            'hp_time' => time(),
        ]);

        $response->assertRedirect(route('admin.login'));
        $response->assertSessionHasErrors(['form']);
        $this->assertGuest();
    }
}
