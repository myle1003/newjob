<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RolesService;

class RoleController extends Controller
{
    /**
     * @var RolesService
     */
    private $role_service;

    public function __construct(
        RolesService $role_service
    ) {
        $this->role_service = $role_service;
    }

    /**
     * Create new account
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_data = [
            'id'=>$request->input('id'),
            'name'=>$request->input('name')
        ];
        $role = $this->role_service->createRole($role_data);
        if(!$role){
            return response()->json([
                'message' => "Create role failed",
            ], 400);
        }
        return response()->json($role,200);
    }
}
