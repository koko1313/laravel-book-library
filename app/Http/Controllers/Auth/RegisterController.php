<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function StoreUser(Request $req)
    {
        $this->validate($req,[
            'facultyNum' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required',
            'cfpassword' => 'required|same:password',
            'email' => 'required|email'
        ]);

        $u = new User();
        $u->facultyNum = $req->facultyNum;
        $u->fname = $req->fname;
        $u->lname = $req->lname;
        $u->password = bcrypt($req->password);
        $u->email = $req->email;
        $u->is_admin = false;

        if($u->save())
        {
            return redirect('login')->with('success','Log in now!');
        }

        return back()->with('error','Please try again!');
    }
}
