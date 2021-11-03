<?php
namespace Database\Seeders\Currencies;

use App\Models\Currency\Currency;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'title' => '',
                'code' => '',
                'symbol_left' => '',
                'symbol_right' => '',
                'decimal_points' => '',
                'thousand_points' => '',
                'decimal_place' => '',
                'currency_rate' => '',
                'exchange_rate' => '',
                'status' => '',
                'is_default' => '',
            ],
        ];
        foreach ($currencies as $currency) {
            Currency::insert([
                'title' => $currency['title'],
                'code' => $currency['code'],
                'symbol_left' => $currency['symbol_left'],
                'symbol_right' => $currency['symbol_right'],
                'decimal_points' => $currency['decimal_points'],
                'thousand_points' => $currency['thousand_points'],
                'decimal_place' => $currency['decimal_place'],
                'currency_rate' => $currency['currency_rate'],
                'exchange_rate' => $currency['exchange_rate'],
                'status' => $currency['status'],
                'is_default' => $currency['is_default'],
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
