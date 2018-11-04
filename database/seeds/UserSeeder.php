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
        // Create a user, and give roles
        $user = App\User::create([
            'name' => 'Developer',
            'slug' => 'developer',
            'email' => 'develop@pekalonganinfo.com',
            'password' => bcrypt('password123$$'),
        ]);

        $user->revokeRole('developer');
        $user->assignRole('developer');

        // Create a user, and give roles
        $user1 = App\User::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'email' => 'admin@pekalonganinfo.com',
            'password' => bcrypt('pekalonganinfo123$$'),
        ]);

        $user->revokeRole('admin');
        $user1->assignRole('admin');

    }
}
