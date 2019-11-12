<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PasswordController extends Controller
{
    public function update(){

    	$user = User::find(Auth::id());
    	$user->update(['password'=>Hash::make(request()->input('password'))]);
    	//handle events here
    	return back();
    }
}