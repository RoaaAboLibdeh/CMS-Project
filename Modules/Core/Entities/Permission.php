<?php

namespace Modules\Core\Entities;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission as SpatiePermission;


class Permission extends SpatiePermission
{
    protected $fillable = ['name', 'guard_name', 'group'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
   
}
