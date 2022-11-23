<?php

namespace App\Services;


use App\Models\RoleHasPermission;
use DB;
use Exception;

class PermissionService
{

    /**
     * Create new member
     * @param array $roles
     * @return \App\Models\RoleHasPermission
     */
    public function get($id)
    {
        $roles = RoleHasPermission::select('permission_id')
            ->where('role_id','=',$id)
            ->orderBy('role_id')
            ->get();
        return $roles;
    }
}
