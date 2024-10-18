<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::with('parkingLot')->orderByDesc('id')->get();
    }

    public function createUser(array $data)
    {
        return User::create([
            'user_name' => $data['user_name'],
            'name' => $data['name'],
            'password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'id_number' => $data['id_number'],
            'email' => $data['email'],
            'id_role' => $data['id_role'],
            'id_parking_lot' => $data['id_parking_lot'],
        ]);
    }

    public function getUserById(int $id)
    {
        return User::with('parkingLot')->findOrFail($id);
    }

    public function updateUser(array $data, int $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'user_name' => $data['user_name'],
            'name' => $data['name'],
            'password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'id_number' => $data['id_number'],
            'email' => $data['email'],
        ]);

        return $user;
    }

    public function deleteUser(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
