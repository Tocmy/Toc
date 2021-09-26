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
}

?>
