<?php
namespace Database\Seeders\Pages;

use App\Models\Page\PageGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PageGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagegroups = [
            'title'             => '',
            'description'       => '',
            'slug'              => '',
            'status'            => '',
            'position'          => '',
            'parent_id'         => '',
            'customer_group_id' => '',
        ];
        foreach ($pagegroups as $pagegroup) {
            PageGroup::insert([
                'title'                  => $pagegroup['title'],
                'description'            => $pagegroup['description'],
                'slug'                   => $pagegroup['slug'],
                'status'                 => $pagegroup['status'],
                'position'               => $pagegroup['position'],
                'parent_id'              => $pagegroup['parent_id'],
                'customer_group_id'      => $pagegroup['customer_group_id'],
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
