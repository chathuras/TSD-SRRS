<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        $admin = Role::where('name', 'admin')->first();
        $admin->givePermissionTo('category_crud');
        $admin->givePermissionTo('resource_crud');
        $admin->givePermissionTo('user_crud');
        $admin->givePermissionTo('resource_view_all');
        $admin->givePermissionTo('reservation_reserve');
        $admin->givePermissionTo('reservation_cancel_any');
        $admin->givePermissionTo('reservation_cancel_self');
        $admin->givePermissionTo('reports_all');
        $admin->givePermissionTo('reports_public');
        $admin->givePermissionTo('reports_self');

        $officer = Role::where('name', 'officer')->first();
        $officer->givePermissionTo('resource_view_all');
        $officer->givePermissionTo('reservation_reserve');
        $officer->givePermissionTo('reservation_cancel_any');
        $officer->givePermissionTo('reservation_cancel_self');
        $officer->givePermissionTo('reports_public');
        $officer->givePermissionTo('reports_self');

        $teacher = Role::where('name', 'teacher')->first();
        $teacher->givePermissionTo('resource_view_all');
        $teacher->givePermissionTo('reservation_reserve');
        $teacher->givePermissionTo('reservation_cancel_self');
        $teacher->givePermissionTo('reports_self');

        $student= Role::where('name', 'student')->first();
        $student->givePermissionTo('resource_view_all');
        $student->givePermissionTo('reservation_reserve');
        $student->givePermissionTo('reservation_cancel_self');
        $student->givePermissionTo('reports_self');
    }
}
