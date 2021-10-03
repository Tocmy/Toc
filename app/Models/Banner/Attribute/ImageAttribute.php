<?php
namespace App\Models\Banner\Attribute;


/**
 *
 */
trait ImageAttribute
{
    public function setStatusAttribute($value)
    {
        if ((bool) $value) $this->attributes['status'] = $value;
        else {
            $this->attributes['status'] = null;
        }
    }

    public function getUploadedTimeAttribute()
    {
        return $this->created_at->diffForHuman();
    }

    public function getSizeAttribute()
    {
        //return $this->size ? round($this->size /1024, 2) :Null;
        return $this->size->bytesToHuman();
    }

    private function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}


?>
