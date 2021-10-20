<?php
namespace App\Models\Setting\Relationship;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * Setting
 */
trait SettingGroupRelationship
{
   /**
    * Get all of the comments for the SettingGroupRelationship
    *
    * @return \
    */
   public function settings(): HasMany
   {
       return $this->hasMany(Setting::class, 'setting_group_id', 'id');
   }
}

