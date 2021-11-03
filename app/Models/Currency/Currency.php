<?php
namespace App\Models\Currency;

use App\Models\Currency\Relationship\CurrencyRelationship;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory, SoftDeletes, CurrencyRelationship;
    /**
    * The table associated with the model.
    *ecom-backend/property valuation
    *classy and cka
    * @var  string
    */
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'title', 'symbol_left', 'symbol_right', 'code', 'decimal_place', 'exchange_rate', 'currency_rate', 'decimal_point',
         'thousand_point', 'status', 'is_default', 'is_cryptocurrency', 'store_id', 'setting_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'title' => '',
        'symbol_left' => '',
        'symbol_right' => '',
        'code' => '',
        'decimal_place' => '',
        'exchange_rate' => NULL,
        'currency_rate' => NULL,
        'decimal_point' => '',
        'thousand_point' => '',
        'status' => NULL,
        'is_default' => false,
        'is_cryptocurrency' => false,
        'store_id' => 0,
        'setting_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    * action/laravel-ecom, ckacrm
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'is_default' => 'boolean',
        'is_cryptocurrency' => 'boolean',
    ];

    public function getDefaultCurrency()
    {
        $currencies = Currency::where('is_default',1)->first();
        return $currencies;
    }

    public function getExchangeRate($toCurrency, $fromCurrency)
    {
        $setting  = Setting::getAll()->pluck('value', 'field')->toArray();
        $currencies =$this->whereIn('id', [$setting['default_currency_id'], $fromCurrency, $toCurrency])->get();
        $currencyConverter =CurrencyConverter::getAll()->where('status', 1)->first();
        $to = $currencies->where('id', $toCurrency)->first();
        $from = $currencies->where('id', $fromCurrency)->first();
        if (empty($to)|| empty($from)) {
            return 1;
        }
        $default = $currencies->where('is_default', 1)->first();
        if ($to->id == $from->id) {
            return 1;
        }
        $fromExchangeRate = $from->exchange_from == 'api' ? getCurrencyRate($default->name, $from->name, $currencyConverter) : $from->exchange_rate ;
        $toExchangeRate = $to->exchange_from == 'api' ? getCurrencyRate($default->name, $to->name, $currencyConverter) : $to->exchange_rate;
        if ($fromExchangeRate == 0 || $toExchangeRate == 0) {
            return 0;
        }

        return number_format((float)($toExchangeRate / $fromExchangeRate), (float)$setting['exchange_rate_decimal_digits'], '.', '');

    }

}
