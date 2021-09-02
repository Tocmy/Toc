<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        //Users
        $this->call(Users\PermissionsTableSeeder::class);
        $this->call(Users\RolesTableSeeder::class);

        Model::reguard();
    }
}
