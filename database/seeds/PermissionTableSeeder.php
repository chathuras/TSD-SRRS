<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        Permission::create(['name' => 'category_crud']);
        Permission::create(['name' => 'resource_crud']);
        Permission::create(['name' => 'user_crud']);
        Permission::create(['name' => 'resource_view_all']);
        Permission::create(['name' => 'reservation_reserve']);
        Permission::create(['name' => 'reservation_cancel_any']);
        Permission::create(['name' => 'reservation_cancel_self']);
        Permission::create(['name' => 'reports_all']);
        Permission::create(['name' => 'reports_public']);
        Permission::create(['name' => 'reports_self']);
    }
}
