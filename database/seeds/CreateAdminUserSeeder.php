<?php

use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create(['name' => 'areej',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')]);
        $role = \Spatie\Permission\Models\Role::create(['name' => 'Admin']);
        $permissions = \Spatie\Permission\Models\Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
