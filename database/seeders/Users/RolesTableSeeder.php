<?php

namespace Database\Seeders\Users;
use App\Models\User\Role;
use App\Models\User\Permission;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RoleItems = [
            [
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => __('Admin Role'),
                'level'       => 5,
            ],

            [
                'name'        => 'Affiliate',
                'slug'        => 'affiliate',
                'description' => __('Affiliate Role'),
                'level'       => 1,
            ],
            [
                'name'        => 'Customer',
                'slug'        => 'customer',
                'description' => __('Customer Role'),
                'level'       => 1,
            ],
            [
                'name'        => 'Dealer',
                'slug'        => 'dealer',
                'description' => __('Dealer Role'),
                'level'       => 1,
            ],
            [
                'name'        => 'Distributor',
                'slug'        => 'distributor',
                'description' => __('Distributor Role'),
                'level'       => 1,
            ],
            [
                'name'        => 'Author',
                'slug'        => 'author',
                'description' => __('author Role'),
                'level'       => 1,
            ],

            [
                'name'        => 'User',
                'slug'        => 'user',
                'description' => __('User Role'),
                'level'       => 1,
            ],

            [
                'name'        => 'Unverified',
                'slug'        => 'unverified',
                'description' => __('Unverified Role'),
                'level'       => 0,
            ],

        ];
        foreach ($RoleItems as $RoleItem)
        $newRoleItem = Role::where('slug', '=', $RoleItem['slug'])->first();
        if ($newRoleItem  === null) {
            $newRoleItem = Role::create([
                'name'        => $RoleItem['name'],
                'slug'        => $RoleItem['slug'],
                'description' => $RoleItem['description'],
                'level'       => $RoleItem['level'],
            ]);
        }

        $permissions = Permission::all();
        $roleAdmin   = Role::where('name', '=', 'Admin')->first();
        foreach ($permissions as $permission){
            $roleAdmin->attachPermission($permission);
        }

    }
}
