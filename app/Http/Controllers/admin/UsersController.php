<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where(['uuid' => $id])->first();
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::where(['uuid' => $id])->first();
        $user->name = $request->name;
        $user->save();
        return redirect()->back()->with('message','User updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function disableUser(Request $request, $id){

        $disableOrEnableUser = User::where('uuid', $id)->update(['isActive' => $request->status]);
        if($disableOrEnableUser == 1){
            $response = ['status' => 200,'message' => 'User has been !'.($request->status == 1) ? 'Published' : 'Disabled'];
        }else{
            $response = ['status' => 401,'message' => 'Something went wrong please check and try again later..'];
        }
        return response()->json($response);
    }

    public function disabledUser(){
        $users = User::where(['isActive' => 0])->whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->paginate(10);
        return view('admin.users.disabled',compact('users'));
    }

    // public function cloneUser(Request $request, $id){

    // }
}
