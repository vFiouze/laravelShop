<?php

namespace App\Http\Controllers;

use App\Product;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App;

class ProductController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Product::class);
        $product = new Product();
        return view('product.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $this->authorize('create',Product::class);   
        $validatedData = $request->validate($this->validationRules(),$this->messages());
        if($request->has('image')){
            $path = $request->file('image')->store('uploads','public');
            //resize image
            $image=Image::make(public_path('storage/'.$path))->fit(100,100,null,'top-left');
            $image->save();
            $validatedData['image']=$path;
        }
        $validatedData['rating']='4';
        $product = Product::create($validatedData);
        return view('product.show',compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $this->authorize('update',$product);
        return view('product.edit',compact('product'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update',$product);
        $validateData = $request->validate($this->validationRules(),$this->messages());
        $product->update($validateData);
        return redirect('product/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    private function validationRules(){
        return [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'sometimes|required|image'
        ];
    }

    private function messages(){
        return [
            'name.required'=>'Please fill the name field',
            'price.required'=>'Please fill the price field',
            'price.numeric'=>'The price has to be a numeric value',
            'description.required'=>'Please fill the description field',
            'image.required' => 'The image is required',
            'image.image' => 'PLease upload a jpeg, png, bmp, gif, svg, or webp file',
            'max' => 'The image cannot be bigger than 5MB',
        ];
    }
}
