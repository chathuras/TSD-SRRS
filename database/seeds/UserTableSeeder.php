<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::truncate();
        $users = [
          [
            'name' => $faker->name,
            'email' => 'admin@srrs.app',
            'password' => bcrypt('admin1'),
            'created_at' => gmdate('Y-m-d H:i:s'),
            'updated_at' => gmdate('.Y-m-d H:i:s')
          ]
        ];

        for ($i = 0; $i < 4; $i++) {
            array_push($users, [
              'name' => $faker->name,
              'email' => $faker->email,
              'password' => bcrypt($faker->password),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('Y-m-d H:i:s')
            ]);
        }
        User::insert($users);

    }
}
