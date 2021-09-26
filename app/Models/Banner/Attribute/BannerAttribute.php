<?php
namespace App\Models\Banner\Attribute;


/**   set statuslabelattribute
 *   <input class="switch switch-pink" type="checkbox" id="pink" checked/>
 *   <label for="pink">Grid</label>
 */
trait BannerAttribute
{
   public function getStatusAttribute()
   {
       return $this->attributes['status'] == 0 ? 'Disable' :'Enable';
   }



}

?>
