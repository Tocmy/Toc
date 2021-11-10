<?php
namespace App\Models\Brand\Attribute;



/**   set statuslabelattribute
 *   <input class="switch switch-pink" type="checkbox" id="pink" checked/>
 *   <label for="pink">Grid</label>
 *
 * livewire /neon 
 */
trait BrandAttribute
{
   public function getStatusAttribute()
   {
       return $this->attributes['status'] == 0 ? 'Disable' :'Enable';
   }



}

?>
