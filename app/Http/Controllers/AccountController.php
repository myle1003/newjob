<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\AccountsService;
use App\Services\RolesService;

class AccountController extends Controller
{
    /**
     * @var AccountsService
     */
    private $account_service;

    /**
     * @var RolesService
     */
    private $role_service;

    public function __construct(
        AccountsService $account_service,
        RolesService $role_service
    ) {
        $this->account_service = $account_service;
        $this->role_service = $role_service;
    }

    /**
     * Create new account
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account_data = [
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'gender'=>$request->input('gender'),
            'status'=>$request->input('status'),
            'address'=>$request->input('address'),
            'role_id'=>$request->input('role_id'),
            'password'=>$request->input('password'),
        ];

        $account_data['password'] = bcrypt($account_data['password']);

        $account = $this->account_service->createAccount($account_data);
        if(!$account){
            return response()->json([
                'message' => __('message.account.createFail'),
            ], 400);
        }
        return response()->json($account,200);
    }

    /**
     * show account by role_id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $accounts = $this->account_service->getAccountByRole($id);
        return view('admin')->with(['members' => $accounts]);
//        return response()->json($accounts, 200);
    }

    /**
     * Edit account by id_account
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Account $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exists = $this->account_service->isIdExistsAccount($id);
        if (!$exists) {
            return response()->json([
                'message' => __('message.account.idError'),
            ], 404);
        }

        $account_data = [
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'gender'=>$request->input('gender'),
            'status'=>$request->input('status'),
            'address'=>$request->input('address'),
            'role_id'=>$request->input('role_id'),
            'password'=>$request->input('password'),
        ];
        $this->account_service->updateAccount($account_data, $id);
        $account = $this->account_service->getAccountById($id);

        if (!$account) {
            return response()->json([
                'message' => __('message.account.updateFail'),
            ], 400);
        }
        return response()->json($account, 201);
    }

    /**
     * Delete account by id_account
     * @param \App\Models\Account $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $account = $this->account_service->isIdExistsAccount($id);

        if (!$account) {
            return response()->json([
                'message' => __('message.account.idError'),
            ], 400);
        }

        $account = $this->account_service->destroy($id);
        return response()->json(__('message.account.deleteSuccess'), 201);
    }

    /**
     * Login into systems
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $phone = $request->input(['phone']);


        $password = $request->input(['password']);
        $is_account_exists = $this->account_service->isIdExistsAccountWithPhoneAndPassword($phone, $password);
        if (!$is_account_exists) {
            return response()->json([
                'message' => __('message.account.loginFail'),
            ], 401);
        }
        return response()->json([
            'message' => __('message.account.loginSuccess'),
        ], 200);
    }
}
