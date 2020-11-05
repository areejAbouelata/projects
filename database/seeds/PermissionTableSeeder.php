<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['role-list', 'role-create', 'role-edit',
            'role-delete',
            'client-list', 'client-create',
            'client-edit', 'client-delete',
            'project-list', 'project-create',
            'project-edit', 'project-delete',
            'note-list', 'note-create',
            'note-edit', 'note-delete',
            'user-list', 'user-create',
            'user-edit', 'user-delete',

        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }
    }
}
