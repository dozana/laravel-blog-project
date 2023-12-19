<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('front.dashboard');
    }

    public function update_data(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
        ]);

        $update = Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if($update) {
            $request->session()->flash('updating_results', [
                'class' => 'success',
                'message' => trans('site.info_updated')
            ]);
        } else {
            $request->session()->flash('updating_results', [
                'class' => 'danger',
                'message' => trans('site.update_error')
            ]);
        }

        return redirect()->back();
    }

    public function update_password(Request $request)
    {
        // გადავამოწმოთ ემთხვევა თუ არა შეყვანილი ძველი პაროლი ავტორიზებული მომხმარებლის პაროლს
        if(!Hash::check($request->old_password,  Auth::user()->password)) {
            $request->session()->flash('updating_results', [
                'class' => 'danger',
                'message' => trans('site.old_password_error')
            ]);

            return redirect()->back();
        }

        $this->validate($request, [
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $update = Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        if($update)
        {
            $request->session()->flash('updating_results', [
                'class' => 'success',
                'message' => trans('site.info_updated')
            ]);
        }
        else
        {
            $request->session()->flash('updating_results', [
                'class' => 'danger',
                'message' => trans('site.update_error')
            ]);
        }

        return redirect()->back();
    }
}
