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
        // $this->call(UsersTableSeeder::class);

        // Basic roles data
        App\Role::insert([
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'editor'],
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

        // Add a permission to a role
        $role = App\Role::where('name', 'admin')->first();
        $role->addPermission('access.backend');
        $role->addPermission('create.user');
        $role->addPermission('edit.user');
        $role->addPermission('delete.user');
        // ... Add other role permission if necessary

        // Create a user, and give roles
        $user = App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');

        App\Category::insert([
            ['name' => 'Fashion',
             'slug' => 'fashion',
            ],
            ['name' => 'Treveler',
             'slug' => 'treveler',
            ],
            ['name' => 'Style',
             'slug' => 'style',
            ],
        ]);
        DB::table('posts')->truncate();

        // generate 10 dummy posts data
          $posts = [];
          $faker = Faker\Factory::create();
          $date = Carbon::create(2018, 3, 7, 9);

          for ($i = 1; $i <= 10; $i++) {
              $date->addDays(1);
              $publishedDate = clone ($date);
              $createDate = clone ($date);

              $posts[] = [
                  'user_id' => 1,
                  'category_id' => rand(1, 2),
                  'title' => $faker->sentence(rand(8, 12)),
                  'body' => $faker->paragraphs(rand(10, 15), true),
                  'slug' => $faker->slug(),
                  'image' => "blogs_1.jpeg",
                  'created_at' => $createDate,
                  'updated_at' => $createDate,
                  'published_at' => $i < 5 ? $publishedDate : (rand(0, 1) == 0 ? null : $publishedDate->addDays(4)),
              ];
          }

          DB::table('posts')->insert($posts);
    }
}
