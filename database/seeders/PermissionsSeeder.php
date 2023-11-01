<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'user_management_access',
            ],
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'office_management',
            ],
            [
                'title' => 'department_create',
            ],
            [
                'title' => 'department_edit',
            ],
            [
                'title' => 'department_show',
            ],
            [
                'title' => 'department_delete',
            ],
            [
                'title' => 'department_access',
            ],
            [
                'title' => 'position_create',
            ],
            [
                'title' => 'position_edit',
            ],
            [
                'title' => 'position_show',
            ],
            [
                'title' => 'position_delete',
            ],
            [
                'title' => 'position_access',
            ],
            [
                'title' => 'blog_create',
            ],
            [
                'title' => 'blog_edit',
            ],
            [
                'title' => 'blog_show',
            ],
            [
                'title' => 'blog_delete',
            ],
            [
                'title' => 'blog_access',
            ],

        ];

        Permission::insert($permissions);
    }
}