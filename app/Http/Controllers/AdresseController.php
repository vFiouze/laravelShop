<?php

namespace App\Http\Controllers;
use App\Customer;
Use App\Adresse;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdresseController extends Controller
{
    public function update(){
    	$id = request()->input('id');
        $validatedData = request()->validate($this->validationRules());
    	$add = Customer::find(Auth::id())->address->where('id',$id)->first();
    	$add->update($validatedData);
         $this->manageDefault($add);
    	return back();
    }

    public function destroy($address)
    {
    	$add = Customer::find(Auth::id())->address->where('id',$address)->first();
    	$add->delete();
    	return back();
    }

    public function store(){
    	$validatedData = request()->validate($this->validationRules());
        $add=Customer::find(Auth::id())->address()->create($validatedData);
        $this->manageDefault($add);
        return back();
    }

    public function validationRules(){
        return [
            'address'=>'required',
            'zip'=>'required',
            'town'=>'required',
            'geodiv'=>'required',
            'country'=>'required',

        ];
    }

    public function manageDefault(Adresse $add){
        if(request()->input('default')=="on"){
            Customer::find(Auth::id())->address()->where(['default'=>1])->update(['default'=>0]);
            $add->update(['default'=>1]);
        }
    }
}
