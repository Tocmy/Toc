<?php

namespace Database\Seeders\Banners;

use App\Models\Banner\BannerGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BannerGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannergroups=[
            [
                'name'         => 'Advertiment',
                'position'     => '1',
                'status'       => '1',
            ],

            [
                'name'         => 'Banner',
                'position'     => '2',
                'status'       => '1',
            ],
            [
                'name'         => 'Carousel',
                'position'     => '3',
                'status'       => '1',
            ],
            [
                'name'         => 'Slidershow',
                'position'     => '4',
                'status'       => '1',
            ],
        ];

        foreach($bannergroups as $bannergroup){
            BannerGroup::insert([
                'name'        => $bannergroup['name'],
                'position'    => $bannergroup['position'],
                'status'      =>$bannergroup['status'] ? $bannergroup['status'] :1,
                'created_at'  => Carbon::Now(),
                'updated_at'  => Carbon::Now(),
            ]);
         }
    }
}
