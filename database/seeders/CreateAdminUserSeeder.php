<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'New User',
            'email' => 'newuser@gmail.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'Writer']);

        $permissions = Permission::pluck('id')->toArray();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
}



