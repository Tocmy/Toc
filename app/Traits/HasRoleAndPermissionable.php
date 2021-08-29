<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User\Permission;
use App\Models\User\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use InvalidArgumentException;
/**
 *
 */
trait HasRoleAndPermissionable
{


    /**
     * JerenyKenedy/LaravelRole
     *
     * @var [type]
     */
    /**
     * Property for caching roles.
     *
     * @var Collection|null
     */
     protected $roles;
     protected $permissions;

    /**
     * The roles that belong to the HasRoleAndPermissionable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    }


     public function getRoles()
     {
         return (!$this->roles) ? $this->roles = $this->roles()->get() : $this->roles;
     }

     public function hasRole($role, $all = false)
     {
         if ($this->isPretendEnabled()) {
             return $this->pretend('hasRole');
         }
         if (!$all) {
             return $this->hasRole($role);
         }
         return $this->hasAllRoles($role);
     }

     public function hasOneRole($role)
     {
         foreach($this->getArrayFrom($role)as $role)
         {
             if ($this->checkRole($role)) {
                 return true;
             }
         }
         return false;
     }

     public function hasAllRoles($role)
     {
         foreach ($this->getArrayFrom($role) as $role) {
             if (!$this->checkRole($role)) {
                 return false;
             }
         }
         return true;
     }

     public function checkRole($role)
     {
         return $this->getRoles()->contains(function ($value) use($role){
             return $role == $value->id || Str::is($role, $value->slug);
         });
     }

     public function attachRole($role)
     {
         if ($this->getRoles()->contains($role)) {
             return true;
         }
         $this->roles = null;
         return $this->roles()->attach($role);
     }

     public function detachRole($role)
     {
         $this->roles = null;
         return $this->roles()->detach($role);
     }

     public function detachAllRole()
     {
         $this->roles = null;
         return $this->roles()->detach();

     }

     public function syncRoles($roles)
     {
         $this->roles= null;
         return $this->roles()->sync($roles);
     }

     public function level()
     {
         return ($role = $this->getRoles()->sortByDesc('level')
                 ->first()) ? $role->level :0;
     }

     public function rolePermissions()
     {
         $permissions = Permission::class;
         if (!$permissions instanceof Model) {
                 throw new InvalidArgumentException('[App\Models\User\Permission::class] must be an instance of \Illuminate\Databale\Eloquent\Model');
         }

         if (config('roles.inheritance')) {
             return $permissions = Permission::select([
                                   'permissions.*', 'permission_role_at.creted_at as pivot_created_at', 'permission_role.updated_at as pivot_updated_at'])
                                   ->join('permission_role', 'permission_role.permission_id', '=','permission.id')
                                   ->join('roles','roles.id', 'permission_role.role_id')
                                   ->whereIn('roles.id', $this->getRoles()->pluck('id')->toArray())
                                   ->onWhere('roles.level', '<', $this->level())
                                   ->groupBy([
                                       'permissions.id', 'permissions.name','permissions.slug','permissions.description',
                                       'permissions.model',
                                       'permissions_created_at',
                                       'permissions_updated_at',
                                       'permissions_deleted_at',
                                       'pivot_created_at',
                                       'pivot_updated_at',
                                   ]);
         }else{
             return $permissions = Permission::select([
                                  'permissions.*', 'permissions_role.created_at as pivot_created_at', 'permission_role.updated_at as pivot_at'])
                                   ->join('permission_role', 'permission_role.permission_id', '=','permission.id')
                                   ->join('roles','roles.id', 'permission_role.role_id')
                                   ->whereIn('roles.id', $this->getRoles()->pluck('id')->toArray())
                                   ->groupBy(
                                    'permissions.id', 'permissions.name','permissions.slug','permissions.description',
                                    'permissions.model',
                                    'permissions_created_at',
                                    'permissions_updated_at',
                                    'permissions_deleted_at',
                                    'pivot_created_at',
                                    'pivot_updated_at',
                                   );
         }
     }

     public function userPermissions()
     {
         return $this->belongToMany(Permission::class)->withTimestamps();
     }

     public function getPermissions()
     {
         return(!$this->permissions) ?
              $this->permissions = $this->rolePermissions()
                         ->get()->merge($this->userPermissions()->get()) : $this->permissions;
     }

     public function hasPermission($permission, $all = false)
     {
         if ($this->isPretendEnable()) {
             return $this->pretend('hasPermission');
         }
         if (!$all) {
             return $this->hasOnePermission($permission);
         }
         return $this->hasAllPermissions($permission);

     }

     public function hasOnePermission($permission)
     {
         foreach($this->getArrayFrom($permission)as $permission){
                 if ($this->checkPermission($permission)) {
                     return true;
                 }
         }
         return false;
     }

     public function hasAllPermissions($permission)
     {
         foreach($this->getArrayFrom($permission)  as $permission)
         {
             if (!$this->checkPermission($permission)) {
                 return false;
             }
             return true;
         }
     }

     public function checkPermission($permission)
     {
         return $this->getPermissions()->contains(function ($value)use ($permission){
             return $permission == $value->id || Str::is($permission, $value->slug);
         });
     }

     public function allowed($providedPermission, Model $entity, $owner =true, $ownerColumn= 'user_id')
     {
         if ($this->isPretendEnable()) {
             return $this->pretend('allowed');
         }
         if ($owner ===true && $entity->{$ownerColumn}== $this->id) {
             return true;
         }
         return $this->isAllowed($providedPermission, $entity);
     }

     protected function isAllowed($providedPermission, Model $entity)
    {
        foreach ($this->getPermissions() as $permission) {
            if ($permission->model != '' && get_class($entity) == $permission->model
                && ($permission->id == $providedPermission || $permission->slug === $providedPermission)
            ) {
                return true;
            }
        }

        return false;
    }

    public function attachPermission($permission)
    {
        if ($this->getPermissions()->contains($permission)) {
            return true;
        }
        $this->permissions = null;

        return $this->userPermissions()->attach($permission);
    }

    public function detachPermission($permission)
    {
        $this->permissions = null;

        return $this->userPermissions()->detach($permission);
    }

    public function detachAllPermissions()
    {
        $this->permissions = null;

        return $this->userPermissions()->detach();
    }

    public function syncPermissions($permissions)
    {
        $this->permissions = null;

        return $this->userPermissions()->sync($permissions);
    }

    private function isPretendEnable()
    {
        return (bool) config('roles.pretend.enable');
    }

    private function pretend($option)
    {
        return (bool) config('roles.pretend.options.'.$option);
    }

    private function getArrayFrom($argument)
    {
        return (!is_array($argument)) ? preg_split('/ ?[,|] ?/', $argument) : $argument;
    }

    public function callMagic($method, $parameters)
    {
        if (Str::startsWith($method, 'is')) {
            return $this->hasRole(Str::snake(substr($method, 2), '.'));
        }elseif(Str::startsWith($method, 'can')){
            return $this->hasPermission(Str::snake(substr($method, 3), '.'));

        }elseif(Str::startWith($method, 'allowed')){
            return $this->allowed(Str::snake(substr($method, 7), '.'), $parameters[0],
            (isset($parameters[1])) ? $parameters[1] : true, (isset($parameters[2])) ? $parameters[2] : 'user_id');

        }
        return parent::__call($method, $parameters);
    }

    public function __call($method, $parameters)
    {
        return $this->callMagic($method, $parameters);
    }

}

?>
