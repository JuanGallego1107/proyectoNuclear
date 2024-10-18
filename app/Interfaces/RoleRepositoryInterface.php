<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    /**
     * Retrieve all roles.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllRoles();

    /**
     * Create a new role.
     *
     * @param array $data
     * @return \App\Models\Role
     */
    public function createRole(array $data);

    /**
     * Delete a role by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteRole(int $id);
}
