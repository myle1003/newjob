<?php

namespace App\Services;

use App\Models\Account;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;

class AccountsService
{
    /**
     * Create new member
     * @param array $accounts
     * @return \App\Models\Account
     */
    public function createAccount(array $accounts = [])
    {
        DB::beginTransaction();
        try {
            $account = Account::create($accounts);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $account;
    }

    /**
     * Check account already exists in table account?
     * @param string $id
     * @return boolean
     */
    public function isIdExistsAccount(string $id)
    {
        $account = Account::select('*')
            ->where('id', '=', $id)
            ->first();
        return !empty($account);
    }

    /**
     * Check account already exists in table account?
     * @param string $phone
     * @param string $password
     * @return boolean
     */
    public function isIdExistsAccountWithPhoneAndPassword(string $phone, string $password)
    {
        $account = Account::select('*')
            ->where('phone', '=', $phone)
            ->first();
        if (!$account) {
            return false;
        }
        $hashed_password = $account->password;
        if (Hash::check($password, $hashed_password)) {
            return true;
        }
        return false;
    }

    /**
     * get account by id
     * @param string $id
     * @return boolean
     */
    public function getAccountById(string $id)
    {
        $account = Account::select('*')
            ->where('id', '=', $id)
            ->first();
        return $account;
    }

    /**
     * Get list account by rode_id
     * @param integer role_id
     * @return array \App\Models\Member
     */
    public function getAccountByRole($role_id)
    {
        $members = Account::select('*')
            ->where('role_id', '=', $role_id)
            ->orderBy('name')
            ->get();
        return $members;
    }

    /**
     * Edit account by id_account
     * @param array $accounts
     * @param string $id
     * @return \App\Models\Member
     */
    public function updateAccount($accounts = [], string $id = '')
    {
        DB::beginTransaction();
        try {
            $account = Account::select('*')
                ->where('id', '=', $id)
                ->update($accounts);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $account;
    }

    /**
     * Delete account by id
     * @param string $id
     * @return \App\Models\Account
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $account = Account::where('id', '=', $id)
                ->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $account;
    }
}
