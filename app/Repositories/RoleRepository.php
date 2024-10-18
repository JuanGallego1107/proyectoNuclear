<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAllRoles()
    {
        return Role::all();
    }

    public function createRole(array $data)
    {
        return Role::create([
            'name' => $data['name'],
        ]);
    }

    public function deleteRole(int $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}
