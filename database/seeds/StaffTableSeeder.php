<?php

use App\Staff;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				$faker = Factory::create();

				Staff::truncate();
				$staff = [
						[
							'reg_id' => 'as-99',
							'pin'  => $faker->numberBetween(100, 1000),
							'name' => $faker->name,
							'date_of_birth' => gmdate('Y-m-d H:i:s'),
							'address' => $faker->sentence(2),
							'email_address' => 'staff@srrs.app',
							'contact_number' => '94777278818',
							'post' => $faker->word,
							'created_at' => gmdate('Y-m-d H:i:s'),
							'updated_at' => gmdate('.Y-m-d H:i:s')
						]
					];

					for ($i = 0; $i < 4; $i++) {
							array_push($staff, [
								'reg_id' => 'as-' . $faker->numberBetween(100, 1000),
								'pin'  => $faker->numberBetween(100, 1000),
								'name' => $faker->name,
								'date_of_birth' => gmdate('Y-m-d H:i:s'),
								'address' => $faker->sentence(2),
								'email_address' => 'staff@srrs.app',
								'contact_number' => '94773789094',
								'post' => $faker->word,
								'created_at' => gmdate('Y-m-d H:i:s'),
								'updated_at' => gmdate('.Y-m-d H:i:s')
							]);
					}
					
					for ($i = 0; $i < 4; $i++) {
							array_push($staff, [
								'reg_id' => 'nas-' . $faker->numberBetween(100, 1000),
								'pin'  => $faker->numberBetween(100, 1000),
								'name' => $faker->name,
								'date_of_birth' => gmdate('Y-m-d H:i:s'),
								'address' => $faker->sentence(2),
								'email_address' => 'staff@srrs.app',
								'contact_number' => '94773789094',
								'post' => $faker->word,
								'created_at' => gmdate('Y-m-d H:i:s'),
								'updated_at' => gmdate('.Y-m-d H:i:s')
							]);
					}
					Staff::insert($staff);
    }
}
