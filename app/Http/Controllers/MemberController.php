<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\MenuItem;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\MembersService;

class MemberController extends Controller
{
    // set index page view
    public function index1() {
        return view('index');
    }

    /**
     * @var MembersService
     */
    private $member_service;

    public function __construct(
        MembersService $member_service
    ) {
        $this->member_service = $member_service;
    }

    /**
     * Create new member
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member_data = [
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'gender'=>$request->input('gender'),
            'status'=>$request->input('status'),
            'address'=>$request->input('address')
            ];
        $member = $this->member_service->createMember($member_data);
        if(!$member){
            return response()->json([
                'message' => "Create member failed",
            ], 400);
        }
        return response()->json($member,200);
//        return response()->json(['success'=>'Create member successfully']);
    }

    /**
     * show all member
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = $this->member_service->getMember();
        $menuItems = MenuItem::select('*')
            ->where('status','=','1')
            ->get();
        $items='';
        foreach ($menuItems as $menuItem){
            if($menuItem->link == 'null'){
                $items = Item::select('*')
                    ->where('id_menuItem','=',$menuItem->id)
                    ->get();
            }
        }
        return view('index2')->with(['members' => $members,
            'menuItems' =>$menuItems,
            'items'=>$items]);
//        dd($members);
//        return view('index2')->with(['members' => $members]);
    }

    /**
     * Get member by id_member
     * @param \App\Models\Member $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = $this->member_service->getMemberById($id);
        if (!$member) {
            return response()->json([
                'message' => "show fail",
            ], 400);
        }
        return response()->json($member, 200);
    }

    /**
     * Edit member by id_member
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Member $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exists = $this->member_service->isIdExistsMember($id);

        if (!$exists) {
            return response()->json([
                'message' => "Id error",
            ], 404);
        }

        $member_data = [
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'gender'=>$request->input('gender'),
            'status'=>$request->input('status'),
            'address'=>$request->input('address')
        ];

        $this->member_service->updateMember($member_data, $id);
        $member = $this->member_service->getMemberById($id);

        if (!$member) {
            return response()->json([
                'message' => "update fail",
            ], 400);
        }
        return response()->json(['success'=>'Update member successfully']);
    }

    /**
     * Delete member by id_member
     * @param \App\Models\Member $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $member = $this->member_service->getMemberById($id);

        if (!$member) {
            return response()->json([
                'message' => "Id error",
            ], 400);
        }

        $member = $this->member_service->destroy($id);
        return response()->json(['success'=>'Delete member successfully']);
//        return response()->json('Success', 201);
//        $members = $this->member_service->getMember();
//        return view('index')->with(['members' => $members]);
    }

}
