<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'name' => 'Admin'
        ]);
        $role2 = Role::create([
            'name' => 'Blogger'
        ]);
        $role3 = Role::create([
            'name' => 'User'
        ]);

        Permission::create([
            'name' => 'dashboard',
            'description' => 'See dashboard'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'categories.index',
            'description' => 'See categories list'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'categories.create',
            'description' => 'Create new category'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'categories.edit',
            'description' => 'Edit category'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'categories.destroy',
            'description' => 'Delete category'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'tags.index',
            'description' => 'See tags list'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'tags.create',
            'description' => 'Create new tag'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'tags.edit',
            'description' => 'Edit tag'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'tags.destroy',
            'description' => 'Delete tag'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'posts.index',
            'description' => 'See posts list'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'posts.create',
            'description' => 'Create new post'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'posts.edit',
            'description' => 'Edit post'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'posts.destroy',
            'description' => 'Delete post'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'roles.index',
            'description' => 'See roles list'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'roles.create',
            'description' => 'Create new role'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'roles.edit',
            'description' => 'Edit role'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'roles.destroy',
            'description' => 'Delete role'
        ])->syncRoles([$role1]);


        Permission::create([
            'name' => 'users.index',
            'description' => 'See users list'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.create',
            'description' => 'Create new user'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.edit',
            'description' => 'Edit user'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.destroy',
            'description' => 'Delete user'
        ])->syncRoles([$role1]);


        Permission::create([
            'name' => 'comment.store',
            'description' => 'Create comment'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'comment.destroy',
            'description' => 'Delete comment'
        ])->syncRoles([$role1, $role2, $role3]);



    }
}
