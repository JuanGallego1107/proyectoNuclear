<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    /**
     * Retrieve all users along with their associated parking lots.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers();

    /**
     * Create a new user record.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function createUser(array $data);

    /**
     * Retrieve a specific user by its ID with their associated parking lot.
     *
     * @param int $id
     * @return \App\Models\User
     */
    public function getUserById(int $id);

    /**
     * Update an existing user record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\User
     */
    public function updateUser(array $data, int $id);

    /**
     * Delete a user by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id);
}
