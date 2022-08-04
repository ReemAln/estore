<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
//use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all(); //offset(0)->limit(2)->get();
        return view('products.index',compact('products'));
    }
    public function allProducts()
    {
        $products = Product::all();
        return view('backend.products.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $validatedData = $request->validate([
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
        //    ]);


         //     // Validation


        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',

        ], [
            'name.required' => 'Name field is required.',
           
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }   

    //     //dd($request);
        $product =new Product();

        $product->name = $request->name;
        $product->specs = $request->specs;
        $product->opening_balance = $request->opening_balance;
        $product->balance = $request->opening_balance;
        $product->price = $request->price;

        $product->image = ProductController::resizeImage($request , 500, 500);

        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);
        // $product->image = $imageName;
        
        $product->save();
        return back()->with('success', 'Product has been created successfully.',compact('product'));
       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validation

            

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',

        ], [
            'name.required' => 'Name field is required.',
           
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }   

        //dd($request);

        $product->name = $request->name;
        $product->specs = $request->specs;
        $product->balance = $request->balance;
        $product->price = $request->price;
        
        if($request->has('removeImage'))
            $product->image = 'no-image.jpg';

        if($request->has('image'))
        {
            $product->image = ProductController::resizeImage($request , 300, 300);

            // $imageName = time().'.'.$request->image->extension();  
            // $request->image->move(public_path('images'), $imageName);
            // $product->image = $imageName;
            
        }  
        

        
        $product->save();
        

        return back()->with('success', 'Product updated successfully.',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return back()->with('success','Product deleted successfully');
    }

    /**
     * 
     * 
     * 
     * My Functions
     * 
     * 
     * 
     */
    
    public function resizeImage(Request $request,int $w,int $h )
    {
        $imageName='';
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
       
        $destinationPathThumbnail = public_path('images/thumbs');
        $img = Image::make($image->path());
        $img->resize($w, $h, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);
     
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);
        return $imageName;
    }






}
