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

        Schema::disableForeignKeyConstraints();
        User::truncate();
        DB::table('user_has_roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $admin = [
          'name' => $faker->name,
          'email' => 'admin@srrs.app',
          'password' => bcrypt('admin1'),
          'status' => '1',
          'activation_key' => $faker->uuid,
          'created_at' => gmdate('Y-m-d H:i:s'),
          'updated_at' => gmdate('.Y-m-d H:i:s')
        ];

        $officer = [
          'name' => $faker->name,
          'email' => 'officer@srrs.app',
          'password' => bcrypt('officer1'),
          'status' => '1',
          'activation_key' => $faker->uuid,
          'created_at' => gmdate('Y-m-d H:i:s'),
          'updated_at' => gmdate('.Y-m-d H:i:s')
        ];

        $teacher = [
          'name' => $faker->name,
          'email' => 'teacher@srrs.app',
          'password' => bcrypt('teacher1'),
          'status' => '1',
          'activation_key' => $faker->uuid,
          'created_at' => gmdate('Y-m-d H:i:s'),
          'updated_at' => gmdate('.Y-m-d H:i:s')
        ];

        $student = [
          'name' => $faker->name,
          'email' => 'student@srrs.app',
          'password' => bcrypt('student1'),
          'status' => '1',
          'activation_key' => $faker->uuid,
          'created_at' => gmdate('Y-m-d H:i:s'),
          'updated_at' => gmdate('.Y-m-d H:i:s')
        ];

        $users = [$admin, $officer, $teacher, $student];

        for ($i = 5; $i < 11; $i++) {
            array_push($users, [
              'name' => $faker->name,
              'email' => $faker->email,
              'password' => bcrypt('user' . $i),
              'status' => '1',
              'activation_key' => $faker->uuid,
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('Y-m-d H:i:s')
            ]);
        }
        User::insert($users);

        $admin = User::where('email', 'admin@srrs.app')->first();
        $admin->assignRole('admin');

        $officer = User::where('email', 'officer@srrs.app')->first();
        $officer->assignRole('officer');

        $teacher = User::where('email', 'teacher@srrs.app')->first();
        $teacher->assignRole('teacher');

        $student = User::where('email', 'student@srrs.app')->first();
        $student->assignRole('student');

        for ($i = 5; $i < 11; $i++) {
            $user = User::where('id', $i)->first();
            $user->assignRole($faker->randomElement([
              'admin',
              'officer',
              'teacher',
              'student'
            ]));
        }
    }
}
