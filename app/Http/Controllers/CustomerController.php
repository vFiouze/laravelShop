<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Geodiv;


class CustomerController extends Controller
{
    public function show(){
        $user = User::find(Auth::id());
        $customer=Customer::find(Auth::id());
        $isCustomer=1;
        if(!$customer){
        	$customer = new Customer();
        	$isCustomer=0;
        }
        $geodiv=Geodiv::all();
        $addresses=$customer->address;
		return view('customer.profile',compact('user','customer','isCustomer','geodiv','addresses'));
    }
}