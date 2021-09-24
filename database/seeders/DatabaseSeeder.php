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
         //Address
         $this->call(Addresses\CountriesTableSeeder::class);
         $this->call(Addresses\StatesTableSeeder::class);
         $this->call(Addresses\TimeZonesTableSeeder::class);
        //Attribute
        $this->call(Attributes\AttributeGroupsTableSeeder::class);
        $this->call(Attributes\AttributesTableSeeder::class);
        //Banner
        $this->call(Banners\BannerGroupsTableSeeder::class);
        //Users
        $this->call(Users\PermissionsTableSeeder::class);
        $this->call(Users\RolesTableSeeder::class);

        Model::reguard();
    }
}
