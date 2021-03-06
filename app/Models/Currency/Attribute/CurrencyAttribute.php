<?php
namespace App\Models\Currency\Attribute;

/**
 *
 */
trait CurrencyAttribute
{
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

?>
