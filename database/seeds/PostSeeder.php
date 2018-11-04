<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('posts')->truncate();

        // // generate 10 dummy posts data
        // $posts = [];
        // $faker = Faker\Factory::create();
        // $date = Carbon::create(2018, 3, 7, 9);

        // for ($i = 1; $i <= 10; $i++) {
        //     $date->addDays(1);
        //     $publishedDate = clone ($date);
        //     $createDate = clone ($date);

        //     $posts[] = [
        //         'user_id' => 1,
        //         'category_id' => rand(1, 2),
        //         'title' => $faker->sentence(rand(8, 12)),
        //         'body' => $faker->paragraphs(rand(10, 15), true),
        //         'slug' => $faker->slug(),
        //         'image' => "blogs_1.jpeg",
        //         'created_at' => $createDate,
        //         'updated_at' => $createDate,
        //         'published_at' => $i < 5 ? $publishedDate : (rand(0, 1) == 0 ? null : $publishedDate->addDays(4)),
        //         'view_count' => rand(1, 10),
        //     ];
        // }

        // DB::table('posts')->insert($posts);
    }
}
