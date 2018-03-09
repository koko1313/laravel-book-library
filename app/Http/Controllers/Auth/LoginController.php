<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function Login(Request $req)
    {
        $this->validate($req,[
            'facultyNum' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('facultyNum', $req->facultyNum)->first();

        if(!$user)
        {
            return back()->with('error','Wrong Details!');
        }

        if(Hash::check($req->password, $user->password))
        {
            Auth::login($user);

            return redirect('/');
        }


        return back()->with('error','Wrong Details!');
    }

    public function Logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
