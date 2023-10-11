<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes=request()->validate([
            'name'=>'required|max:225',
            'username'=>'required|min:3|max:225|unique:users,username',
            'email'=>'required|email|min:3|max:225|unique:users,email',
            'password'=>'required|min:3|max:225'
        ]);

        $attributes['password']=bcrypt($attributes['password']);
        $user=User::create($attributes);

        auth()->login($user);

        session()->flash('success','Your account has been created.');
        return redirect('/');
        //else return redirect('/')->with('success','Your account has been created.');
    }
}
