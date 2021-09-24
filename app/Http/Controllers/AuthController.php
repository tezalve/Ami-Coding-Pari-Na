<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function user()
    {
        // check if user is logged in
        if(!Auth::user()){
		    Session::flash('message', 'Not Logged In!');
            return view('welcome');
        }
        return view('auth.user_view')->with('data', Auth::user()); // send user data to view
    }

    public function register_view()
    {
        return view('auth.register_view');
    }

    public function login_view()
    {
        return view('auth.login_view');
    }

    public function register(Request $request)
    {
        // create user
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

		Session::flash('message', 'Registered!'); //send msg to frontend
        return view('welcome');
    }

    public function login(Request $request)
    {   
        if(
            !Auth::attempt([ // try the credentials
            'email'     => $request->email,
            'password'  => ($request->password)
            ])){
            return response([
                'message' => 'Invalid Credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken; //create token

        //set the token to cookie
        $cookie = cookie('jwt', $token, 60); //60 Minute cookie time

		Session::flash('message', 'Logged In!');

        return response(view('welcome'))->withCookie($cookie);

    }

    public function logout(Request $request)
    {
        $cookie = Cookie::forget('jwt'); // delete cookie, which also logs out user

		Session::flash('message', 'Logged Out!');

		return response(view('welcome'))->withCookie($cookie);
    }

}
