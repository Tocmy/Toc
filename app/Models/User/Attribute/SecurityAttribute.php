<?php
namespace App\Models\User\Attribute;

/**
 *
 */
trait SecurityAttribute
{
    public function setTwoFactorSecretAttribute($value)
    {
          $this->attribute['two_factor_secret'] = encrypt($value);
    }

    public function getTwoFactorSecretAttribute($value)
    {
        return decrypt($value);
    }


}

?>
