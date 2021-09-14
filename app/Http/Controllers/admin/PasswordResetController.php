<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordChangeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function index(Request $request){
        return view('admin.password.index');
       }




       public function update(PasswordChangeRequest $request){
         $updatePassword = User::find(Auth::user()->id);
         $updatePassword->password = Hash::make($request['password']);;
         $updatePassword->save();
         return redirect()->back()->with('message','password updated successfully');
       }
}
