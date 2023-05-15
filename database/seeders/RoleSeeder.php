<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleNames = ['publisher', 'editor', 'destroyer'];

        foreach ($roleNames as $roleName) {
            Role::create(['name' => $roleName]);
        }

        $user = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin!'),
            'isAdmin'=>1,
        ]);

        $user->assignRole($roleNames);
    }
}
