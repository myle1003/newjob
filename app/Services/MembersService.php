<?php

namespace App\Services;

use App\Models\Member;
use DB;
use Exception;

class MembersService
{

    /**
     * Create new member
     * @param array $members
     * @return \App\Models\Member
     */
    public function createMember(array $members = [])
    {
        DB::beginTransaction();
        try {
            $member = Member::create($members);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $member;
    }

    /**
     * Get list member
     * @return array \App\Models\Member
     */
    public function getMember()
    {
        $members = Member::select('*')
            ->orderBy('name')
            ->get();
        return $members;
    }

    /**
     * Edit member by id_member
     * @param array $members
     * @param string $id
     * @return \App\Models\Member
     */
    public function updateMember($members = [], string $id = '')
    {
        DB::beginTransaction();
        try {
            $member = Member::select('*')
                ->where('id', '=', $id)
                ->update($members);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $member;
    }

    /**
     * Check member already exists in table member?
     * @param string $id
     * @return boolean
     */
    public function isIdExistsMember(string $id)
    {
        $member = Member::select('*')
            ->where('id', '=', $id)
            ->first();
        return !empty($member);
    }

    /**
     * Get member by id_member
     * @param string $id
     * @return boolean
     */
    public function getMemberById(string $id)
    {
        $member = Member::select('*')
            ->where('id', '=', $id)
            ->first();
        return $member;
    }

    /**
     * Delete member by id
     * @param string $id
     * @return \App\Models\Member
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $member = Member::where('id', '=', $id)
                ->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $member;
    }
}
