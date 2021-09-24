<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Khoj;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


class KhojController extends Controller
{
    public function search()
    {
        if(!Auth::user()){
		    Session::flash('message', 'Not Logged In!');
            return view('welcome');
        }
        return view('khoj.search')->with('id', Auth::user()->id);
    }

    public function store(Request $request)
    {
        Khoj::create([
            'sorted'      => $request->input,
            'user_id'     => $request->user_id
        ]);
    }

}
