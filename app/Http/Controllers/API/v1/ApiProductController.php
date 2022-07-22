<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        
        return response()->json([
            "success" => true,
            "message" => "Product List",
            "data" => $products
            ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',

        ]);

        $product = new Product([
            'parent_id' => $request->get('parent_id'),
            'name' => $request->get('name'),
            'specs' => $request->get('specs'),
            'image' => $request->get('image'),
            'opening_balance' => $request->get('opening_balance'),
            'price' => $request->get('price')
        ]);
        $product->save();
        //return redirect('/products')->with('success', 'Product saved!');
        return response()->json([
            "success" => true,
            "message" => "Product created successfully.",
            "data" => $product
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
        return $this->sendError('Product not found.');
        }
        return response()->json([
        "success" => true,
        "message" => "Product retrieved successfully.",
        "data" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',

        ]);

        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->specs = $request->get('specs');
        $product->image = $request->get('image');
        $product->balance = $request->get('balance');
        $product->price = $request->get('price');
        $product->save();

        //return redirect('/products')->with('success', 'Product updated!');
        return response()->json([
            "success" => true,
            "message" => "Product updated successfully.",
            "data" => $product
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();

        //return redirect('/products')->with('success', 'Product deleted!');
        return response()->json([
            "success" => true,
            "message" => "Product deleted successfully.",
            "data" => $product
            ]);
    }
}
