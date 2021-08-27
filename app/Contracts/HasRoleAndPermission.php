<?php
namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface HasRoleAndPermission
{

    /**
     * Credit JeremyKenedy/Laravel Role
     */

    public function roles();
    public function getRoles();
    public function hasRole($role, $all = false);
    public function hasOneRole($role);
    public function hasAllRole($role);
    public function checkRole($role);
    public function attachRole($role);
    public function detachRole($role);
    public function detachAllRole();
    public function syncRole($role);
    public function level();
    public function rolePermissions();
    public function userPermissions();
    public function getPermissions();
    public function hasPermission($permission, $all=false);
    public function hasOnePermission($permission);
    public function hasAllPermissions($permission);
    public function checkPermission($permission);
    public function allowed($providedPermission, Model $entity, $owner = true, $ownerColumn ='user_id');
    public function attachPermission($permission);
    public function detachPermission($permission);
    public function detachAllPermissions($permission);
    public function syncPermissions($permission);

}

?>
