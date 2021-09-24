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

    public function getInp(){
        if(!Auth::user()){
		    Session::flash('message', 'Not Logged In!');
            return view('welcome');
        }
        return view('khoj.getInpVal')->with('id', Auth::user()->id);
    }

    public function getInpVal(Request $request){
        $s = $request->start;
        $e = $request->end;
        $s = str_replace("T", " ", $s);
        $e = str_replace("T", " ", $e);

        $data = Khoj::select('user_id', 'sorted', 'created_at')
                    ->from('sorted')
                    ->where('user_id', '=', $request->user_id)
                    ->whereBetween('created_at', [$s, $e])
                    ->get();
                    
        return $data;
    }


}
