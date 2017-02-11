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
            'reg_id' => 'as-100',
            'pin' => $faker->numberBetween(100, 1000),
            'name' => $faker->name,
            'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
            'address' => $faker->address,
            'email_address' => 'astaff@srrs.app',
            'contact_number' => $faker->phoneNumber,
            'post' => ucfirst($faker->word),
            'created_at' => gmdate('Y-m-d H:i:s'),
            'updated_at' => gmdate('.Y-m-d H:i:s')
          ],
          [
            'reg_id' => 'nas-100',
            'pin' => $faker->numberBetween(100, 1000),
            'name' => $faker->name,
            'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
            'address' => $faker->address,
            'email_address' => 'nastaff@srrs.app',
            'contact_number' => $faker->phoneNumber,
            'post' => ucfirst($faker->word),
            'created_at' => gmdate('Y-m-d H:i:s'),
            'updated_at' => gmdate('.Y-m-d H:i:s')
          ]
        ];

        for ($i = 1; $i < 10; $i++) {
            array_push($staff, [
              'reg_id' => 'as-10' . $i,
              'pin' => $faker->numberBetween(100, 1000),
              'name' => $faker->name,
              'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
              'address' => $faker->address,
              'email_address' => $faker->email,
              'contact_number' => $faker->phoneNumber,
              'post' => ucfirst($faker->word),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('.Y-m-d H:i:s')
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            array_push($staff, [
              'reg_id' => 'nas-10' . $i,
              'pin' => $faker->numberBetween(100, 1000),
              'name' => $faker->name,
              'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
              'address' => $faker->address,
              'email_address' => $faker->email,
              'contact_number' => $faker->phoneNumber,
              'post' => ucfirst($faker->word),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('.Y-m-d H:i:s')
            ]);
        }
        Staff::insert($staff);
    }
}
