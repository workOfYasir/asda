<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
        $careers = Career::all();
        return view('frontend.index',compact('careers'));
   }
}
