<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PostSeeder::class);


    //     App\Role::insert([
    //         ['name' => 'developer'],
    //         ['name' => 'admin'],
    //         ['name' => 'author'],
    //         ['name' => 'editor'],
    //         ['name' => 'creator'],
    //     ]);


    //     App\Permission::insert([
    //         ['name' => 'access.backend'],
    //         ['name' => 'create.user'],
    //         ['name' => 'edit.user'],
    //         ['name' => 'delete.user'],
    //         ['name' => 'create.article'],
    //         ['name' => 'edit.article'],
    //         ['name' => 'delete.article'],
    //     ]);

    //     $role = App\Role::where('name', 'admin')->first();
    //     $role->addPermission('access.backend');
    //     $role->addPermission('create.user');
    //     $role->addPermission('edit.user');
    //     $role->addPermission('delete.user');

    //     $user = App\User::create([
    //         'name' => 'Developer',
    //         'slug' => 'developer',
    //         'email' => 'develop@pekalonganinfo.com',
    //         'password' => bcrypt('password123$$'),
    //     ]);

    //     $user->assignRole('developer');


    //     $user1 = App\User::create([
    //         'name' => 'Admin',
    //         'slug' => 'admin',
    //         'email' => 'admin@pekalonganinfo.com',
    //         'password' => bcrypt('pekalonganinfo123$$'),
    //     ]);

    //     $user1->assignRole('admin');


    //     App\Category::insert([
    //         [
    //             'name' => 'Non Kategori',
    //             'slug' => 'non-kategori',
    //         ],
    //         [
    //             'name' => 'Info Sekitar',
    //             'slug' => 'info-sekitar',
    //         ],
    //         [
    //             'name' => 'Wisata',
    //             'slug' => 'wisata',
    //         ],
    //         [
    //             'name' => 'Kuliner',
    //             'slug' => 'kuliner',
    //         ],
    //         [
    //             'name' => 'Olahraga',
    //             'slug' => 'olahraga',
    //         ],
    //     ]);

    //     DB::table('posts')->truncate();

    //     // generate 10 dummy posts data
    //     $posts = [];
    //     $faker = Faker\Factory::create();
    //     $date = Carbon::create(2018, 3, 7, 9);

    //     for ($i = 1; $i <= 10; $i++) {
    //         $date->addDays(1);
    //         $publishedDate = clone ($date);
    //         $createDate = clone ($date);

    //         $posts[] = [
    //             'user_id' => 1,
    //             'category_id' => rand(1, 2),
    //             'title' => $faker->sentence(rand(8, 12)),
    //             'body' => $faker->paragraphs(rand(10, 15), true),
    //             'slug' => $faker->slug(),
    //             'image' => "blogs_1.jpeg",
    //             'created_at' => $createDate,
    //             'updated_at' => $createDate,
    //             'published_at' => $i < 5 ? $publishedDate : (rand(0, 1) == 0 ? null : $publishedDate->addDays(4)),
    //             'view_count' => rand(1, 10),
    //         ];
    //     }

    //     DB::table('posts')->insert($posts);
    }
}
