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
        // Basic roles data
        App\Role::insert([
            ['name' => 'developer'],
            ['name' => 'admin'],
            ['name' => 'author'],
            ['name' => 'editor'],
            ['name' => 'creator'],
        ]);

        // Basic permissions data
        App\Permission::insert([
            ['name' => 'access.backend'],
            ['name' => 'create.user'],
            ['name' => 'edit.user'],
            ['name' => 'delete.user'],
            ['name' => 'create.article'],
            ['name' => 'edit.article'],
            ['name' => 'delete.article'],
        ]);
    }
}
