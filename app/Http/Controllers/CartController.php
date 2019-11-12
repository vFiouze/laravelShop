<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function addToCart(){
    	//get the posted value
    	$productId = request()->input('productId');
    	$quantity = request()->input('quantity',1);

    	//check if session has cart
    	if(session()->has('cart')){
    		$cart = session()->get('cart');
    	}else{
    		$cart = array();
    	}
    	//add new elements to cart
    	//check if product already in cart
    	$add=True;
    	foreach ($cart as $index=>$element) {
    		$productInCart = $element['productId'];
    		if ($productInCart==$productId){
    			$cart[$index]['quantity']=$cart[$index]['quantity']+$quantity;
    			$add=false;
    			break;
    		}
    	}
    	if($add){
			$array = ['productId'=>$productId,'quantity'=>$quantity];
    		array_push($cart, $array);
    	}

    	//add cart to session
    	session(['cart'=>$cart]);
    	$products = Product::all();
    	return view('product.index',compact('products'));
    }

    public function showCart(){
        $productsInCart=$this->buildQuery();
    	return view('cart.show',compact('productsInCart'));
    }

    public function updateCart(){
    	//update cart with data from request
        $data = request()->all();
        $cart=session()->get('cart');
        foreach ($data as $key=>$value) {
            if(strpos($key, 'quantity')!==false){
                $product = substr($key,-2,2);
                $quantity=$value;
                foreach ($cart as $index=>$element) {
                    if($element['productId']==$product){
                        if($quantity!=0){
                            $cart[$index]['quantity']=$quantity;
                        }else{
                            unset($cart[$index]);
                        }
                        break;
                    }
                }

            }
        }
        session(['cart'=>$cart]);
        $productsInCart=$this->buildQuery();
    	return view('cart.show',compact('productsInCart'));
    }

    public function buildQuery(){
        $cart = session()->get('cart');
        $productsIdQuery = array();
        foreach ($cart as $element) {
            array_push($productsIdQuery, $element['productId']);
        }
        $productsInCart = Product::whereIn('id',$productsIdQuery)->get();

        //adding quantity before sending products
        foreach ($productsInCart as $productInCart) {
            foreach ($cart as $element) {
                if ($element['productId']==$productInCart->id){
                    $productInCart['quantity'] = $element['quantity'];
                }
            }
        }
        return $productsInCart;
    }
}
