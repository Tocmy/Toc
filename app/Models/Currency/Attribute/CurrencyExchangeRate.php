<?php
namespace App\Models\Currency\Attribute;

use App\Models\Company\Company;
use App\Models\Currency\Currency;
use App\Models\Setting\Setting;
use GuzzleHttp\Client;

/**
 * classy-crm
 *client managemnet
 */
trait CurrencyExchangeRate
{
    Public function updateExchangeRates() {
        $currencies = Currency::all();
        $setting    = Setting::first();
        $ApiKey     = ($setting->currency_converter_key) ? $setting->currency_convert_key :env('Currency_Convert_key');

        foreach ($currencies as $currency) {
            $client = new Client();
            $url    = 'https://free.currencyconverterapi.com/api/v6/convert?q=';
            $res    = $client->request('GET', $url .$setting->currency->code. '_' . $currencies->code .'&compact=ultra&apiKey' .$ApiKey );
            $conversationRate = $res->getBody();
            $conversationRate = json_decode($conversationRate, true);
            $currency->exchange_rate = $conversationRate[strtoupper($setting->currency->code). '_'. $currency->code];
            $currency->save();
        }


    }
}

?>
