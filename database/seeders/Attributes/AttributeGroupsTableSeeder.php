<?php
namespace Database\Seeders\Attributes;



use App\Models\Attribute\AttributeGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttributeGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributegroups=[
            [

                'name'               => '',
                'position'           => ''
            ],
        ];
        foreach($attributegroups as $attributegroup){
           AttributeGroup::insert([
               'name'        => $attributegroup['name'],
               'position'    => $attributegroup['position'],
               'created_at'  => Carbon::Now(),
               'updated_at'  => Carbon::Now(),
           ]);
        }
    }
}
