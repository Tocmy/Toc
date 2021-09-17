<?php

namespace Database\Seeders\Addresses;

use App\Models\Address\Country;
use App\Models\Address\State;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Continue_;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path = 'Addresses/data/states';
        $files=glob(__DIR__ . '/' . $file_path . '/' .'*.json');
        foreach($files as $file){
            $country = Country::where('id')->first();
            $country_id = $country->id;
            $country_name = $country->name;
            if (! $country_id) continue;
            $json = json_decode(file_get_contents($file), true);
            foreach ($json as $key=>$state) {
                if (! isset($state['iso_code'])) continue; 
                $state =State::insert([
                  'country_id' => $country_id,
                  'name'       => $state['name'],
                  'iso_code'   => $state['iso_code'] ? $state['iso_code'] : null,
                  'iso_numeric'   => $state['iso_numeric'] ? $state['iso_numberic'] : null,
                  'calling_code'   => $state['calling_code'] ? $state['calling_code'] : null,
                  'status'         => $state['status'] ? $state['status'] : 1,
                  'created_at'     => Carbon::Now(),
                  'updated_at'     => Carbon::Now(),

              ]);
            }
        }
    }
}
