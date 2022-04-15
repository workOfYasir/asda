<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Mail\ContactUs;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $contact =new Contact;
        $contact->username = $request->username;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->city = $request->city;
        $contact->message = $request->message; 
        $contact->save();
        $details = [
            'username' =>$request->username,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>'contact us',
            'message'=>$request->message,
        ];
        // Mail::to($user->email)->send(new ContactUs($details));
        return response()->json([
            'success'=> true,
            'status'=>1,
            'message'=>'successfull',
        ]);
    }
    public function show()
    {
        $careers = Career::all();
        return view('frontend.pages.contacts',compact('careers'));
    }
}
