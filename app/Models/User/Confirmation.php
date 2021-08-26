<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'confirmations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'confirmation_code', 'confirmed', 'confirmed_at', 'user_id', 'active', 'locale', 'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['confirmation_code'];

    public function setConfirmationCodeAttribute($value)
    {
        if(is_null($value)){
            $this->attributes['confirmation_code'] = null;
        }
        else{
            $this->attributes['confirmation_code'] = $this->getUniqueConfirmationCode();
        }
    }

    private function getUniqueConfirmationCode()
    {
        $code = $this->email;
        if(self::where('confirmation_code' , $code)->first())
        {
            return $this->getUniqueConfirmationCode();
        }
        return $code;
    }

    public function scopeConfirmed($query, $confirmed = true)
    {
        return $query->where('confirmed', $confirmed);
    }

    public function scopeActive($query, $status = true)
    {
        return $query->where('active', $status);
    }

    public function isActive()
    {
        return $this->active == 1;
    }

    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }

}
