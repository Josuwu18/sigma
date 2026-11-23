<?php

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('a user can log in and is redirected to the dashboard', function () {
    $user = User::factory()->create([
        'password' => Hash::make('correct-password'),
    ]);

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'correct-password',
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticatedAs($user);
});

test('invalid credentials do not authenticate the user', function () {
    User::factory()->create([
        'email' => 'admin@sigma.com',
        'password' => Hash::make('correct-password'),
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'admin@sigma.com',
        'password' => 'wrong-password',
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});

test('the dashboard requires authentication and logout ends the session', function () {
    $this->get(route('dashboard'))->assertRedirect(route('login'));

    $user = User::factory()->create();
    $this->actingAs($user)->get(route('dashboard'))->assertOk();

    $this->post(route('logout'))->assertRedirect(route('login'));
    $this->assertGuest();
});

test('the admin seeder creates the default account with a hashed password', function () {
    Artisan::call('db:seed', ['--class' => AdminUserSeeder::class]);

    $user = User::where('email', 'admin@sigma.com')->firstOrFail();

    expect(Hash::check('admin_sigma', $user->password))->toBeTrue();
});
