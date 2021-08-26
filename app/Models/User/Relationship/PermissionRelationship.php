<?php
namespace App\Models\User\Relationship;

/**
 *
 */
trait PermissionRelationship
{
      public function roles()
      {
          return $this->belongsToMany(App\Models\User\Role::class,'permission_role','permission_id','role-id')
                      ->withTimestamps();
      }

      public function users()
      {
          return $this->belongsToMany(App\Models\User\User::class, 'permission_user', 'permission_id', 'user_id')
                      ->withTimestamps();
      }
}

