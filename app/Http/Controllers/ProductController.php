<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function __construct(){

        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return  ProductCollection::collection(Product::paginate(20));

        // return Product::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // return auth()->user();
        $product =  Product::create([
            'name' => $request->name,
            'details' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount' => $request->discount,
            'user_id' => auth()->user()->id
        ]);

        return response([
            'data' => new ProductResource($product)
        ],201);
        // return $request->all();
        // return 'sumthing';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return $product['details'];

        return new ProductResource($product);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request['details'] = $request->description;
        unset( $request['description']);
        // return $request->all();


        $product_update = $product->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => 'Product Update Successfully',
            'product' => new ProductResource($product)
        ]);

        // return $product_update;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => "Product Delete Sussffully"
        ]);
    }
}
