<?php
namespace App\Models\Affiliate\Attribute;

/**
 *
 */
trait CommissionAttribute
{
    public function getNameAttribute($value)
    {
        return __($value);
    }

    //public function scopeEnable($query , $value=1)
    //{
       // return $query->where('enabled', $value);
    //}

}

?>
