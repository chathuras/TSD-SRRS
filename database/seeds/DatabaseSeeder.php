<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleHasPermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
//         $this->call(StaffTableSeeder::class);
//         $this->call(StudentTableSeeder::class);
//         $this->call(CategoryTableSeeder::class);
//         $this->call(ResourceTableSeeder::class);
//         $this->call(ReservationsTableSeeder::class);
    }
}
