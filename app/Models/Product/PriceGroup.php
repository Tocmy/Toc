<?php

namespace App\Models\Product;

use App\Models\Product\Relationship\PriceGroupRelationship;
use App\Models\User\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PriceGroup extends Model
{
    use HasFactory, PriceGroupRelationship;

    /**
    * The table associated with the model.
    * l8\customerrelationship (copy)
    * @var  string
    */
    protected $table = 'price_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'percentage', 'min_quantity', 'max_quantity', 'price', 'product_id', 'setting_id','status','description'
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'percentage' => 0,
        'min_quantity' => 0,
        'max_quantity' => 0,
        'price' => 0,
        'product_id' => 0,
        'setting_id' => 0,
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

    public static function forPriceList($store_id)
    {
        $price_groups = PriceGroup::where('store_id', $store_id)
                        ->status()
                        ->get();
        $pricelist = [];
        $role =Role::find(Auth::user()->role_id);
        if ($role->hasPermission('price_group')) {
             $pricelist[0] = __('Price Group');
        }
        foreach ($price_groups as $price_group) {
            if ($role->hasPermission('price_group.' .$price_group->id)) {
                $pricelist[$price_group->id] = $price_group->name;
            }
        }
        return $pricelist;

    }

}
