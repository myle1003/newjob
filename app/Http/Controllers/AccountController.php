<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Item;
use App\Models\MenuItem;
use App\Models\RouteItems;
use App\Models\Routes;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\AccountsService;
use App\Services\RolesService;
use Auth;
use Session;
use Spatie\Permission\Models\Permission;

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

//       $routes = Routes::select('*')
//           ->get();
//       $items = '';
//       foreach ($routes as $route) {
//           $items = RouteItems::select('*')
////               ->where('id_route', '=', $route->id)
//               ->get();
//       }
//       dd($items);
       $accounts = $this->account_service->getAccountByRole($id);
       $menuItems = MenuItem::select('*')
           ->where('status','=','1')
           ->get();
       $items='';
       foreach ($menuItems as $menuItem){
           if($menuItem->link == 'null'){
               $items = Item::select('*')
                   ->where('status','=','1')
                   ->get();
           }
       }
       return view('admin2')->with(['accounts' => $accounts,
                                          'menuItems' =>$menuItems,
                                          'items'=>$items]);

   }





    /**
     * show account by id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = $this->account_service->getAccountById($id);
        return response()->json($account, 200);
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
        return response()->json(['success'=>'Update account successfully']);
//        return response()->json($account, 201);
//        $accounts = $this->account_service->getAccountByRole($request->input('role_id'));
//        return view('admin')->with(['accounts' => $accounts]);
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

        $account = $this->account_service->getAccountById($id);

        $account = $this->account_service->destroy($id);
        return response()->json(['success'=>'Delete account successfully']);
//        $accounts = $this->account_service->getAccountByRole($account->role_id);
//        return view('admin')->with(['accounts' => $accounts]);
//        return response()->json(__('message.account.deleteSuccess'), 201);
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
       $arr=[
           'phone'=>$phone,
           'password'=>$password
       ];
       if(!Auth::attempt($arr))
       {
            return view('login');
        }
        $id = auth()->user()->id;
//       dd(auth()->user()->role_id);
        $account = $this->account_service->getAccountById($id);
        $role_id = $account->role_id;
        if($role_id == 1){
            return redirect('/accounts/1');
        }
        return redirect('/accounts/2');
    }

    public function getlogin(){
        return view('login');
    }

//         public function getlogin()
//     {
////         Role::create( ['name'=>'Super admin']);
////         Permission::create(['name'=>'Delete super admin']);
//
//          $role = Role::findById(1);
//          $permission = Permission::findById(1);
//          $role->givePermissionTo($permission);
// ////        $role->revokePermissionTo($permission);
// //        $account = $this->account_service->getAccountByRole(2);
// //        dd($account);
////         dd(auth()->user());
//         // $account = Account::find(1);
//         // if ($account->hasRole('Super admin')){
//         //     echo 'Yes';
//         // }else {
//         //     echo 'No';
//         // };
// //        dd($account);
// //        $account->assignRole('Admin');
//
//         $accounts = $this->account_service->getAccountByRole(1);
//         return view('admin')->with(['accounts' => $accounts]);
// //        return view('permission');
//     }

}
