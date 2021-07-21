<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class kitcont extends Controller
{
    //
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where(['email'=>$request->email])->first();
        //return $request->input();
        
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }

    function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);


        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect('/login'); 
    }
}