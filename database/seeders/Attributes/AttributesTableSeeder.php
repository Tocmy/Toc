<?php
namespace Database\Seeders\Attributes;



use App\Models\Attribute\Attribute;
use App\Models\Attribute\AttributeGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            [
                'attribute_group_id' =>'',
                'name'               => '',
                'position'           => ''
            ]
        ];
        foreach ($attributes as $attribute) {
            Attribute::insert([
               'attribute_group_id' =>$attribute['attribute_group_id'],
               'name'        => $attribute['name'],
               'position'    => $attribute['position'],
               'created_at'  => Carbon::Now(),
               'updated_at'  => Carbon::Now(),
            ]);
        }
    }
}
