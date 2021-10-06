<?php
namespace App\Models\Currency;

use App\Models\Currency\Relationship\CurrencyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory, SoftDeletes, CurrencyRelationship;
    /**
    * The table associated with the model.
    *ecom-backend/property valuation
    * @var  string
    */
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'title', 'symbol_left', 'symbol_right', 'code',
        'decimal_place', 'value', 'decimal_point', 'thousand_point',
        'status','is_default',
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
        'value' => 0,
        'decimal_point' => '',
        'thousand_point' => '',
        'status' => true,
        'is_default' => false,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'status' => 'boolean',
        'is_default' => 'boolean',
    ];

    public static function ConvertCurrencyintoWord($number, $code)
    {
         $no           = round($number);
         $decimal      = round($number - ($no = floor($number)), 2)*100;
         $digits_length = strlen($no);
         $i            = 0;
         $str          = [];
         $words        = [
            0 => '',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen',
            20 => 'Twenty',
            30 => 'Thirty',
            40 => 'Forty',
            50 => 'Fifty',
            60 => 'Sixty',
            70 => 'Seventy',
            80 => 'Eighty',
            90 => 'Ninety',
         ];
         $digits = ['', 'Hundres', 'Thousond', 'Million', 'Billion'];
         while ($i < $digits_length){
             $divider = ($i ==2) ? 10: 100;
             $number  = floor($no % $divider);
             $no      = floor($no / $divider);
             $i       += $divider ==10? 1:2;
             if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
            } else {
                $str [] = null;
            }

         }
         if ($code[0]['title'] != '') {
             $currency_word = $code[0]['title'];
         }
         $currency_word = implode('', array_reverse($str));
         $thousand      = $decimal ? "And" . ($words[$decimal - $decimal%10]). "". ($words[$decimal%10]). "Thousand" : '';
         return ($currency_word ? ucfirst($currency_word). "".$currency_word : '' ). $thousand. "Only";
    }
}
