<?php

use App\Resources;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
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
        Resources::truncate();
        Schema::enableForeignKeyConstraints();

        $resources = [];

        for ($i = 0; $i < 10; $i++) {
            array_push($resources, [
              'name' => ucfirst($faker->word),
              'category_id' => $faker->numberBetween(1, 10),
              'location' => $faker->sentence(2),
              'description' => $faker->sentence(6),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('Y-m-d H:i:s')
            ]);
        }
        Resources::insert($resources);
    }
}
