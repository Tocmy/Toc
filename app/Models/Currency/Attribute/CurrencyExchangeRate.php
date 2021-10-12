<?php
namespace App\Models\Currency\Attribute;

use App\Models\Company\Company;
use App\Models\Currency\Currency;
use App\Models\Setting\Setting;

/**
 *client managemnet
 */
trait CurrencyExchangeRate
{
    Public function updateExchangeRates() {
        $currencies = Currency::all();


    }
}

?>
