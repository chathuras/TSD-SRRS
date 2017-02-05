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

        Student::truncate();
//$faker->numberBetween(1, 10),
        $students = [
          [
						'reg_id' => 's-99',
						'pin'  => $faker->numberBetween(100, 1000),
						'name' => $faker->name,
						'date_of_birth' => gmdate('Y-m-d H:i:s'),
            'address' => $faker->sentence(2),
						'email_address' => 'student@srrs.app',
						'contact_number' => '94777278818',
						'class' => '11B',
            'created_at' => gmdate('Y-m-d H:i:s'),
            'updated_at' => gmdate('.Y-m-d H:i:s')
          ]
        ];

        for ($i = 0; $i < 4; $i++) {
            array_push($students, [
              'student_id' => 's-' . $faker->numberBetween(100, 1000),
							'pin'  => $faker->numberBetween(100, 1000),
							'name' => $faker->name,
							'date_of_birth' => gmdate('Y-m-d H:i:s'),
							'address' => $faker->sentence(2),
							'email_address' => 'student@srrs.app',
							'contact_number' => '94773789094',
							'class' => '11B',
							'created_at' => gmdate('Y-m-d H:i:s'),
							'updated_at' => gmdate('.Y-m-d H:i:s')
            ]);
        }
        Student::insert($students);
    }
}
