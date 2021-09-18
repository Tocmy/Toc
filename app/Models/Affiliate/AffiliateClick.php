<?php

namespace App\Models\Affiliate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Affiliate\Relationship\AffiliateClickRelationship;

class AffiliateClick extends Model
{
    use HasFactory, AffiliateClickRelationship;
    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'affiliate_clicks';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'affiliate_id',
        'client_date',
        'client_browser',
        'client_ip',
        'client_referer',
        'click',
        'product_id', 'banner_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'affiliate_id' => 0,
        'client_date' => NULL,
        'client_browser' => '',
        'client_ip' => '',
        'client_referer' => '',
        'click' => 0,
        'product_id' => 0,
        'banner_id' => 0,
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'client_date',
    ];

    public function plusClick()
    {
        return $this->update(['click' => $this->click+1]);
    }

    public function resetClick()
    {
        return $this->update(['click' => 0]);
    }

}
