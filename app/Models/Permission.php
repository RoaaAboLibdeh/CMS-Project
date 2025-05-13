<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Models\Role;

class Permission extends SpatiePermission
{
    protected $fillable = ['name', 'guard_name', 'group'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
    public function group()
{
    return $this->belongsTo(PermissionGroup::class, 'permission_group_id');
}


}
