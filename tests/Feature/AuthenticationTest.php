<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visitor_can_view_login_page(): void
    {
        $response = $this->get(route('login'));
        $response->assertSuccessful();
    }

    /** @test */
    public function visitor_can_view_register_page(): void
    {
        $response = $this->get(route('register'));
        $response->assertSuccessful();
    }

    /** @test */
    public function registered_user_can_sign_in_with_correct_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'j@e.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/login', [
            'email' => 'j@e.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function visitor_can_register_with_correct_post_data(): void
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'j@e.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/');
    }

    /** @test */
    public function authenticated_user_can_log_out(): void
    {
        $user = User::factory()->create();
        $this->be($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
