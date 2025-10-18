<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition(): array
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('qwerty123'), 
            'role' => 'admin',
        ];
    }
}
