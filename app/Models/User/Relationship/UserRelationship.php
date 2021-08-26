<?php
namespace App\Models\User\Relationship;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait UserRelationship
{
    public function permissions()
    {
        return $this->belongsToMany(App\Models\User\User::class,'permission_user','user_id', 'permission_id')
                    ->withTimestamps();
    }

    public function roles()
    {
        return $this->belongsToMany(App\Models\User\Role::class,'role_user', 'user_id', 'role_id')
                    ->withTimestamps();
    }

    /**
     * Get all of the comments for the UserRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function confirmations()
    {
        return $this->hasMany(App\Models\User\Confirmation::class, 'user_id', 'id');
    }



    /**
     * Get all of the comments for the UserRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socials()
    {
        return $this->hasMany(App\Models\User\Social::class, 'user_id', 'id');
    }
    /**
     * Get the user associated with the UserRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    /**
     * Get the user associated with the UserRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function security(): HasOne
    {
        return $this->hasOne(App\Models\User\Security::class, 'security_id', 'id');
    }

}

?>
