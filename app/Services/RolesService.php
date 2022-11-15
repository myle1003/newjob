<?php

namespace App\Services;

use App\Models\Role;
use DB;
use Exception;

class RolesService
{

    /**
     * Create new member
     * @param array $roles
     * @return \App\Models\Role
     */
    public function createRole(array $roles = [])
    {
        DB::beginTransaction();
        try {
            $role = Role::create($roles);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $role;
    }
}
