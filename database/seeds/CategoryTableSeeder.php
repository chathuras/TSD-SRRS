<?php

use App\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Category::truncate();
        $categories = [];

        for ($i = 0; $i < 4; $i++) {
            array_push($categories, [
              'name' => ucfirst($faker->word),
              'description' => $faker->sentence(6),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('Y-m-d H:i:s')
            ]);
        }
        Category::insert($categories);
    }
}
