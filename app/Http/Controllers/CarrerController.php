<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CarrerController extends Controller
{
    public function jobStore(Request $request){
        $career = new Career;
        $career->title =$request->name;
        $career->description=$request->summernote;
        $career->save();
        return view('backend.carrer.addJob');
    }
}
