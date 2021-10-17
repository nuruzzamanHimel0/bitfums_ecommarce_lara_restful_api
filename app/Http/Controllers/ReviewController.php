<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\Reivew\ReviewCollection;
use App\Http\Resources\Reivew\ReviewResource;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct(){

        $this->middleware('auth:api')->except('index','show');
    }

    public function index(Product $product)
    {
        return ReviewCollection::collection($product->reviews);
        // return $product->reviews;
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


    public function store(ReviewRequest $request,Product $product)
    {
        $request['product_id'] = $product->id;

        $review_create = Review::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => new ReviewResource($review_create)
        ],200);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
