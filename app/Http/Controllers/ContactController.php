<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function SendMail(Request $request)
    {
    	$model = ['email1' => $request->email,
    			  'message1' => $request->message,
    			  'subject' => $request->subject];

    	Mail::send('mail', $model, function($m){
    		$m->to('raichevski1@mail.com');
    	});

    	return back()->with('success','ok');
    }
}
