<?php
namespace Database\Seeders\Pages;

use App\Models\Page\Page;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=[
            'title'        => '',
            'description'  => '',
            'slug'         => '',
            'position'     => '',
            'status'       => '',
            'page_group_id'=> '',
            'store_id'     => '',
        ];
        foreach($pages as $page){
            Page::insert([
                'title'          => $page['title'],
                'description'    => $page['description'],
                'slug'           => $page['slug'],
                'position'       => $page['position'],
                'status'         => $page['status'],
                'page_group_id'  => $page['page_group_id'],
                'store_id'       => $page['store_id'],
                'created_at'  => Carbon::Now(),
                'updated_at'  => Carbon::Now(),
            ]);
         }
    }
}
