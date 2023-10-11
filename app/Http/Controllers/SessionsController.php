<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }
    public function destroy(){

        auth()->logout();

        return redirect('/')->with('success','Goodbye!');
    }

    public function check(){

        //validate
        $attributes=request()->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        //attempt to autheticate and log in user based on given credentials
        if(auth()->attempt($attributes)){
            session()->regenerate();

            return redirect('/')->with('success','Welcome Back!');
        }

        //auth failed
        return back()->withInput()->withErrors(['email'=>'Provide credentials could not be verified']);
        //throw ValidationException::withMessages(['email'=>'Provide credentials could not be verified']);
    }
}
 
