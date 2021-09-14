<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\Admin\SendVerificationEmail;
use App\Models\EmailResets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailVerified = EmailResets::where('user_id', Auth::user()->id)->latest('id')->first();
        if ($emailVerified != null) {
            return view('admin.profile.index', ['emailStatus' => $emailVerified]);
        } else {
            return view('admin.profile.index');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateProfileData = User::find(Auth::user()->id);
        $updateProfileData->name = $request->name;
        $message = 'Profile updated';
        if (!empty($request->email)) {
            $checkAlreadyRequest  = EmailResets::where('isverify', 0)->first();
            if ($checkAlreadyRequest == null) {
                $token = $request->_token . Auth::user()->uuid . md5(microtime());
                $email = new EmailResets();
                $email->user_id = Auth::user()->id;
                $email->email = $request->email;
                $email->token = $token;
                $email->save();
                $message = 'Check Your mail and click confirm your email.';
                SendVerificationEmail::dispatch($email);
            } else {
                return redirect()->back();
            }
        }
        $updateProfileData->save();
        if ($updateProfileData) {
            return redirect()->back()->with('message', $message);
        }
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


    public function resendEmail()
    {
        $email = EmailResets::where('user_id', Auth::user()->id)->where('isverify', 0)->latest('id')->first();
        SendVerificationEmail::dispatch($email);
        return redirect()->back()->with('message', 'Email has been Resend successfully.');
    }


    public function cancelEmailUpdate()
    {
        $email = EmailResets::where('user_id', Auth::user()->id)->where('isverify', 0)->latest('id')->first();

        $res = EmailResets::where('id', $email->id)->delete();
        if($res){
            return redirect()->back()->with('message', 'Email update canceled.');
        }
    }

    public function verifyEmail(Request $request, $token)
    {
        $verifyEmail = EmailResets::where('token', $token)->where('isverify', 0)->first();
        if ($verifyEmail != null) {
            DB::table('email_resets')
                ->where('token', $token)
                ->update(['isverify' => 1]);

            DB::table('users')
                ->where('id', $verifyEmail->user_id)
                ->update(['email' => $verifyEmail->email]);

            return redirect('admin/profile')->with('message', 'Email verified.');
        } else {
            return redirect()->back();
        }
    }


}
