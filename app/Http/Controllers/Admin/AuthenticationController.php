<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{

    public function login()
    {
        return view("admin.authentication.login");
    }

    // username: admin
    // Password: Admin@yTTd6tow
    public function verification(Request $request){

        $validation =  [
            'username' => 'required',
            'password' => 'required'
        ];
        $validation = Validator::make($request->all(), $validation);
        if ($validation->fails()) {
            return $this->validationError($validation);
        } else {
            $inputs = $request->input();

            $userDetails = DB::table('users')
                        ->where('username', '=', $inputs['username'])
                        ->where('password', '=', md5($inputs['password']))
                        ->where('status', '=', 'Active')
                        ->first();
            if(!empty($userDetails)){
                $session_data = array(
                    "login_status" => "1",
                    "id" => $userDetails->id,
                    "display_name" => $userDetails->display_name,
                    "username" => $userDetails->username,
                    "state" => $userDetails->state,
                );
                $request->session()->put($session_data);
                return redirect()->intended('admin/dashboard');
            } else {
                $request->session()->flash('error_message', __("admin_messages.invalid_username_and_password"));
                return redirect()->route('admin');
            }
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect("admin");
    }

    public function changePassword(Request $request){
        return view('admin.authentication.change_password');
    }

    public function updatePassword(Request $request){
        $inputs = $request->input();
        DB::table('users')->where('id', session('id'))->update(['password' => md5($inputs['password'])]);
        $request->session()->flash('success_message', __("admin_messages.password_has_been_changed_successfully"));
        return redirect()->route('admin.change.password');
    }

}
