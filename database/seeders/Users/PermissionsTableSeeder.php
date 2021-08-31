<?php

namespace Database\Seeders\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\User\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissionitems = [
            //attribute
            [
                'name'        => __('Can View Attributes'),
                'slug'        => 'view.Attributes',
                'description' => __('Can view Attributes'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Create Attributes'),
                'slug'        => 'create.Attributes',
                'description' => __('Can create new Attributes'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Edit Attributes'),
                'slug'        => 'edit.Attributes',
                'description' => __('Can edit Attributes'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Delete Attributes'),
                'slug'        => 'delete.Attributes',
                'description' => __('Can delete Attributes'),
                'model'       => 'Permission',
            ],
            //AttributeGroup
            [
                'name'        => __('Can View AttributeGroups'),
                'slug'        => 'view.AttributeGroups',
                'description' => __('Can view AttributeGroups'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Create AttributeGroups'),
                'slug'        => 'create.AttributeGroups',
                'description' => __('Can create new AttributeGroups'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Edit AttributeGroups'),
                'slug'        => 'edit.AttributeGroups',
                'description' => __('Can edit AttributeGroups'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Delete AttributeGroups'),
                'slug'        => 'delete.AttributeGroups',
                'description' => __('Can delete AttributeGroups'),
                'model'       => 'Permission',
            ],

            //Brand
            [
                'name'        => __('Can View Brands'),
                'slug'        => 'view.Brands',
                'description' => __('Can view Brands'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Create Brands'),
                'slug'        => 'create.Brands',
                'description' => __('Can create new Brands'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Edit Brands'),
                'slug'        => 'edit.Brands',
                'description' => __('Can edit Brands'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Delete Brands'),
                'slug'        => 'delete.Brands',
                'description' => __('Can delete Brands'),
                'model'       => 'Permission',
            ],


            //user
            [
                'name'        => __('Can View Users'),
                'slug'        => 'view.users',
                'description' => __('Can view users'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Create Users'),
                'slug'        => 'create.users',
                'description' => __('Can create new users'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Edit Users'),
                'slug'        => 'edit.users',
                'description' => __('Can edit users'),
                'model'       => 'Permission',
            ],
            [
                'name'        => __('Can Delete Users'),
                'slug'        => 'delete.users',
                'description' => __('Can delete users'),
                'model'       => 'Permission',
            ],
        ];

        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = Permission::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem         = Permission::create([
                    'name'                 => $Permissionitem['name'],
                    'slug'                 => $Permissionitem['slug'],
                    'description'          => $Permissionitem['description'],
                    'model'                => $Permissionitem['model'],

                ]);
            }

        }

    }

}
