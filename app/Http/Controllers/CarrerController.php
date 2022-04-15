<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppliedJob as MailAppliedJob;
use Carbon\Carbon;

class CarrerController extends Controller
{
    public function jobStore(Request $request){
        $career = new Career;
        $career->title =$request->name;
        $career->description=$request->summernote;
        $career->save();
        return view('backend.carrer.addJob');
    }
    public function show()
    {
        $careers = Career::all();
        return view('frontend.pages.career',compact('careers'));
    }
    public function applied_job(Request $request)
    {
        $career = new AppliedJob;
        if($request->has('file')){
            $career->file = $request->file ;
            $destinationPath=public_path('resumes/');
            $imageName = rand(10,900).'.'.$career->file->extension();
            $career->file->move($destinationPath, $imageName);
        }
        $career->username = $request->username ;
        $career->email = $request->email ;
        $career->phone = $request->phone ;
        $career->vacancy = $request->vacancy; 
        $career->message = $request->message ; 
        $career->portfolio = $request->portfolio;
        $career->save();
        $vacancy = Career::where('id',$request->vacancy)->pluck('title');
        $details = [
            'username' => $request->username,
            'title' => $vacancy,
            'subject' => 'Candidate Applied for Job',
            'message' =>$request->message,
        ];
        // Mail::to(config('mail.from.address'))->send(new MailAppliedJob($details));
        return response()->json([
            'success'=> true,
            'status'=>1,
            'message'=>'successfull',
        ]);
      
    }
    
}
