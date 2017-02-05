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

        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $categories = [];

        for ($i = 0; $i < 10; $i++) {
            array_push($categories, [
              'name' => ucfirst($faker->word),
              'description' => $faker->sentence(6),
              'icon' => $faker->image('public\storage', 640, 480, 'cats', false),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('Y-m-d H:i:s')
            ]);
        }
        Category::insert($categories);
    }
}
