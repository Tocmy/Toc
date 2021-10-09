<?php
namespace App\Models\Marketing\Attribute;


/**
 *
 */
trait CouponAttribute
{
     

     public function getStatusAttribute()
     {

        if ($this->status ==1) {
            $status = '<div class="switch d-inline m-r-10">
            <input class="status" type="checkbox" data-coupon_id="'. $this->id .'"  id="switch-'. $this->id .'" checked="">
            <label for="switch-'. $this->id .'" class="cr"></label>
        </div>';;
        }else {
            $status = '<div class="switch d-inline m-r-10">
                    <input class="status" type="checkbox" data-coupon_id="'. $this->id .'"  id="switch-'. $this->id .'">
                    <label for="switch-'. $this->id .'" class="cr"></label>
                </div>';;
        }
        return $status;
     }

     public function getButtonAttribute($route)
     {
        $action = '<div class="btn-group dropdown">
        <button aria-expanded ="false" data-toggle="dropdown" class="btn dropdown" type="button">
        <i class="las la-ellipsis-v"></i>
        </button>
        <div class="dropdown-menu">
        <a href="'.route($route, [$this->id]).'" class="dropdown-item">
        <i class="las la-pen-nib" aria-hidden="true"></i>
        '.__('Edit').'
        </a>
        <a href="'.route($route, [$this->id]).'" class="dropdown-item">
        <i class="las la-trash aria-hidden="true"></i>
        '.__('Delete').'
        </a>';



      $action .='</div></div>';
      return $action;
     }
}


?>

