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
        // check if user is logged in
        if(!Auth::user()){
		    Session::flash('message', 'Not Logged In!');
            return view('welcome');
        }
        return view('khoj.search')->with('id', Auth::user()->id);
    }

    public function store(Request $request)
    {
        // store sorted values
        Khoj::create([
            'sorted'      => $request->input,
            'user_id'     => $request->user_id
        ]);
    }

    public function getInp(){
        // check if user is logged in
        if(!Auth::user()){
		    Session::flash('message', 'Not Logged In!');
            return view('welcome');
        }
        return view('khoj.getInpVal')->with('id', Auth::user()->id);
    }

    public function getInpVal(Request $request){
        $s = $request->start;
        $e = $request->end;
        $s = str_replace("T", " ", $s); // input type date has a "T" in the timestamp, replace 
        $e = str_replace("T", " ", $e); // that with a space so it matches the data in table

        // query to find user input from database table
        $data = Khoj::select('user_id', 'sorted', 'created_at')
                    ->from('sorted')
                    ->where('user_id', '=', $request->user_id)
                    ->whereBetween('created_at', [$s, $e])
                    ->get();
        
        $arr = (array) $data;
        if($data->count()==0){
            return "No data";
        } else {
            return  json_encode($data);
            // dd($data->all());
        };
    }


}
