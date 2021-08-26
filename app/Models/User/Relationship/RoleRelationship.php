<?php
namespace App\Models\User\Relationship;

/**
 *
 */
trait RoleRelationship
{
    public function permissions()
    {
        return $this->belongsToMany(App\Models\User\Permission::class, 'permission_role', 'role_id', 'permission_id')
                    ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(App\Models\User\User::class,'role_user', 'role_id', 'user_id')
                    ->withTimestamps() ;
    }
}

