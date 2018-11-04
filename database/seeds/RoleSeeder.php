<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        // Basic roles data
        App\Role::insert([
            ['name' => 'developer'],
            ['name' => 'admin'],
            ['name' => 'author'],
            ['name' => 'editor']
        ]);

    }
}
