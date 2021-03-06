<?php

namespace App\Models\Marketing;

use App\Models\Marketing\Relationship\CouponRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory, CouponRelationship;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coupons';
    /**
     * The attributes that are mass assignable.
     * ---looncart---fleet cart--logged amanacart
     * @var array
     */
    protected $fillable = [
        'code', 'coupon_discount', 'logged', 'shipping', 'total', 'date_start',
        'expire_at', 'uses_total', 'uses_customer', 'status', 'min_order', 'uses_per_coupon', 'name',
        'descriptions', 'quantity', 'image', 'store_id', 'type_id', 'setting_id',
    ];

    protected $attributes = [
        'code' => '',
        'coupon_discount' => '0.0000',
        'logged' => false,
        'shipping' => false,
        'total' => '0.0000',
        'date_start' => NULL,
        'expire_at' => NULL,
        'uses_total' => 0,
        'uses_customer' => '',
        'status' => NULL,
        'min_order' => '0.0000',
        'uses_per_coupon' => 0,
        'name' => '',
        'descriptions' => '',
        'quantity' => 0,
        'image' => '',
        'store_id' => 0,
        'type_id' => 0,
        'setting_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *Looncart work
    * @var  array
    */
    protected $casts = [
        'logged' => 'boolean',
        'shipping' => 'boolean',
        'status' => 'boolean',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var  array
    */
    protected $dates = [
        'date_start', 'expire',
    ];

    public function checkCoupon($id)
    {
        $coupons = Coupon::find($id)->first();
        if ($coupons) {
             if (Carbon::parse($coupons->expire)->timestamp > Carbon::now()->timestamp || is_null($coupons->expire)) {
                  return $coupons;
             }
        }
        return false;
    }

    public function availableCoupons()
    {
        $coupons = [];
        foreach (Coupon::all() as $coupon) {
            if (Carbon::parse($coupon->expire)->timestamp > Carbon::now()->timestamp || is_null($coupon->expire)) {
                array_push($coupons, $coupon);
            }
        }
    }


    private function getLoggedinCustomerId($customer = null)
    {
        if (Auth::guard('customer')->check()) {
            $customer = Auth::guard('customer')->user()->id;
        }
        elseif(Auth::guard('api')->check()){
            $customer = Auth::guard('api')->user()->id;
        }
        return $customer;
    }



}
