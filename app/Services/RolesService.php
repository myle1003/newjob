<?php

namespace App\Services;


use DB;
use Exception;
use Spatie\Permission\Models\Role;

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
