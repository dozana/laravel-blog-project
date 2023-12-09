<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    public function showLogin(Request $request)
    {
        return $request->session()->has('admin') ? redirect()->route('AdminMainPage') : view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
           'password' => 'required',
           'email' => 'required|email'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if(!$admin || ($admin && !Hash::check($request->password, $admin->password))) {
            return redirect()->back()->with('login_failed', true);
        }

        $request->session()->put('admin' , $admin);

        return redirect()->route('AdminMainPage');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');

        return redirect()->route('ShowLogin');
    }
}
