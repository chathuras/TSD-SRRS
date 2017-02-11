<?php

use App\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
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
        Student::truncate();
        Schema::enableForeignKeyConstraints();

        $students = [
          [
            'reg_id' => 's-100',
            'pin' => $faker->numberBetween(100, 1000),
            'name' => $faker->name,
            'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
            'address' => $faker->address,
            'email_address' => 'student@srrs.app',
            'contact_number' => $faker->phoneNumber,
            'class' => $faker->numberBetween(1,
                13) . ucfirst($faker->lexify('?')),
            'created_at' => gmdate('Y-m-d H:i:s'),
            'updated_at' => gmdate('.Y-m-d H:i:s')
          ]
        ];

        for ($i = 1; $i < 10; $i++) {
            array_push($students, [
              'reg_id' => 's-10' . $i,
              'pin' => $faker->numberBetween(100, 1000),
              'name' => $faker->name,
              'date_of_birth' => gmdate('Y-m-d H:i:s'),
              'address' => $faker->address,
              'email_address' => $faker->email,
              'contact_number' => $faker->phoneNumber,
              'class' => $faker->numberBetween(1,
                  13) . ucfirst($faker->lexify('?')),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('.Y-m-d H:i:s')
            ]);
        }
        Student::insert($students);
    }
}
