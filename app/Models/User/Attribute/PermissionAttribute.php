<?php
namespace App\Models\User\Attribute;
use Illuminate\Support\Str;

/**
 *
 */
trait PermissionAttribute
{
    public function getNameAttribute($value)
    {
        return __($value);
    }

    public function getDescriptionAttribute($value)
    {
        return __($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '.');
    }
}


?>

