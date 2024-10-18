<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrador',
        ]);

        Role::create([
            'name' => 'Administrador de parqueadero',
        ]);
    }

}
