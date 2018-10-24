<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add a permission to a role
        $role = App\Role::where('name', 'admin')->first();
        $role->addPermission('access.backend');
        $role->addPermission('create.user');
        $role->addPermission('edit.user');
        $role->addPermission('delete.user');
        // ... Add other role permission if necessary

        // Create a user, and give roles
        $user = App\User::create([
            'name' => 'Developer',
            'slug' => 'developer',
            'email' => 'admin@pekalonganinfo.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('developer');
    }
}
