<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;


class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('backend.login.main', [
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        \Auth::logout();

         
        try{
            if (!\Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]))
            {
            // return response()->back()->with('Error','Wrong email or password');//json();
                throw new \Exception('Wrong email or password.');
            }else{
                return redirect()->route('dashboard');
    
            }
        }
        catch(\Exception $e) {
            // return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
          }
        
    }
    public function loginApi(Request $request)
    {
        \Auth::logout();

        if (!\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
         
        ])) {

            throw new \Exception('Wrong email or password.');
        }

        else{
       
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
         
        }
    }


    public function register(Request $request){

        $user=new User;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->save();
        $user->assignRole('client');

        return response(200);

    }

    public function registerApi(Request $request){

        $user=new User;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->save();
        $user->assignRole('client');
        $token = $user->createToken('LaravelAuthApp')->accessToken;
        return response()->json(['token' => $token], 200);

    }


    function show(Request $request){

        $userData = Auth::user();

        return response($userData,200);
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {

        \Auth::logout();
        return redirect('login');
    }
}
