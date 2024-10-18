<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $credentials)
    {
        // Find user by email
        $user = User::where('email', $credentials['email'])->first();

        // If user exist and password matches
        if ($user && Hash::check($credentials['password'], $user->password)) {
            return ['status' => true, 'message' => 'Login successful'];
        }

        // Si fallan las credenciales
        return ['status' => false, 'message' => 'Invalid credentials'];
    }
}
