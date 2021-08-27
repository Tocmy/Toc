<?php
namespace App\Contracts;
use Illuminate\Database\Eloquent\Collection;

interface RoleHasRelationship
{
    public function attachPermission($permission);
    public function detachPermission($permission);
    public function detechAllPermissions();
    public function syncPermissions($permission);
}


?>
