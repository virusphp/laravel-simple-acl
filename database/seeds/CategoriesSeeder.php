<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::insert([
            ['name' => 'Wisata',
             'slug' => 'wisata',
            ],
            ['name' => 'Kuliner',
             'slug' => 'kuliner',
            ],
            ['name' => 'Olahraga',
             'slug' => 'olahraga',
            ],
        ]);
    }
}
