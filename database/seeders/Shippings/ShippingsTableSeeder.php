<?php
namespace Database\Seeders\Shippings;

use App\Models\Shipping\Shipping;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShippingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippings=[
            ['name'     => 'Cash on delivery',
             'status'   => '1',
             'position' => '1',
            ],

            ['name'     => 'Flat rate',
             'status'   => '1',
             'position' => '2',
            ],

            ['name'     => 'Free shipping',
             'status'   => '1',
             'position' => '3',
            ],

            ['name'     => 'Per item',
             'status'   => '1',
             'position' => '4',
            ],

            ['name'     => 'Pickup from Store',
             'status'   => '1',
             'position' => '5',
            ],

            ['name'     => 'Price base shipping',
             'status'   => '1',
             'position' => '6',
            ],

            ['name'     => 'Weight base shipping',
             'status'   => '1',
             'position' => '7',
            ],
        ];

        foreach ($shippings as $shipping) {
            Shipping::insert([
                'name'                  => $shipping['name'],
                'status'                 => $shipping['status'],
                'position'               => $shipping['position'],
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
