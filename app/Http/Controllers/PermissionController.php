<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\MenuItem;
use App\Models\RoleHasPermission;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Services\AccountsService;
use App\Services\RolesService;
use Auth;
//use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class PermissionController extends Controller
{
    /**
     * @var PermissionService
     */
    private $permission_service;

//    public function __construct(
//        PermissionService $permission_service
//    ) {
//        $this->$permission_service = $permission_service;
//    }

     public function index(Request $request)
     {
         $role_data= $request->input('role');
         $role = Role::findById($role_data);
         $permission_data = [
             1=>$request->input('per_mem_add'),
             2=>$request->input('per_mem_edit'),
             3=>$request->input('per_mem_del'),
             4=>$request->input('per_ad_add'),
             5=>$request->input('per_ad_edit'),
             6=>$request->input('per_ad_del'),
             7=>$request->input('per_sad_add'),
             8=>$request->input('per_sad_edit'),
             9=>$request->input('per_sad_del'),

         ];

         for ($i = 1; $i < 10; $i++){
             $permission = Permission::findById($i);
             if($permission_data[$i]==1){
                 $role->givePermissionTo($permission);
             } else {
                 $role->revokePermissionTo($permission);
             }
         }
         return response()->json(['success'=>'Update permission successfully']);
 //        Role::create( ['name'=>'Admin']);
//         Permission::create(['name'=>'Delete super admin']);

//          $role = Role::findById(2);
//          $permission = Permission::findById(5);
//
//          $role->givePermissionTo($permission);
 ////        $role->revokePermissionTo($permission);
 //        $account = $this->account_service->getAccountByRole(2);
 //        dd($account);
//         dd(auth()->user());
         // $account = Account::find(1);
         // if ($account->hasRole('Super admin')){
         //     echo 'Yes';
         // }else {
         //     echo 'No';
         // };
 //        dd($account);
 //        $account->assignRole('Admin');
//
//         $accounts = $this->account_service->getAccountByRole(1);
//         return view('admin2')->with(['accounts' => $accounts]);
 //        return view('permission');
     }

    public function update(Request $request,$id)
    {
        $role_data= $request->input('role');
        $permission_data = $request->input('per_mem_add');

        $role = Role::findById($role_data);
        $permission = Permission::findById($id);
        if($permission_data==1){
            $role->givePermissionTo($permission);
        } else {
            $role->revokePermissionTo($permission);
        }

        return response()->json(['success'=>'Update permission successfully']);
    }

    public function show()
    {
        $roles = RoleHasPermission::select('*')
            ->where('role_id','=',2)
            ->orderBy('permission_id')
            ->get();
//dd($roles);
        $menuItems = MenuItem::select('*')
            ->where('status','=','1')
            ->get();
        return view('permissionAdmin2')->with(['roles' => $roles,'menuItems' =>$menuItems]);
    }

    public function getPermissonAdmin(){
        $menuItems = MenuItem::select('*')
            ->where('status','=','1')
            ->get();
        return view('permissionAdmin2')->with(['menuItems' =>$menuItems]);
//        return view('permissionAdmin2');
    }
    public function getPermissonSuperadmin(){
        $menuItems = MenuItem::select('*')
            ->where('status','=','1')
            ->get();
        return view('permission2')->with(['menuItems' =>$menuItems]);
//        return view('permission2');
    }


}
