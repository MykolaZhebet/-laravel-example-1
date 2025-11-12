<?php

use App\Models\User;
use Illuminate\Support\Facades\Http;

test('user can login with valid credentials via api ', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123')
    ]);
    
    $response = $this->postJson('/api/v1/login', [
        'email' => 'test@example.com',
        'password' => 'password123'
    ]);
    
    $response->assertStatus(200)
        ->assertJsonStructure([
            'user' => [
                'id', 'user_name', 'email'
            ],
            'token'
        ])->assertJson([
            'user' => [
                'id' => $user->id,
                'user_name' => $user->user_name,
                'email' => $user->email
            ]
        ]);
    expect($response->json('token'))->not->toBeEmpty();
    $this->assertAuthenticated();
});

test('user cannot login with wrong credentials via api ', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123')
    ]);
    
    $response = $this->postJson('/api/v1/login', [
        'email' => 'wrong_test@example.com',
        'password' => 'password123'
    ]);
    $response->assertStatus(422)
        ->assertJsonValidationErrors(['email']);
    $this->assertGuest();
});

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
