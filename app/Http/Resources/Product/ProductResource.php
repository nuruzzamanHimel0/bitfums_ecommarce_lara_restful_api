<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'name' => $this->name,
            'description' => $this->details,
            'stock' => $this->stock == 0 || is_null($this->stock) ? 'Out of stock' : $this->stock ,
            'price' => $this->price,
            'discount' => $this->discount,
            'total_price' => round(  ( $this->discount *$this->price)/100),
            'rating' => $this->reviews->count() >  0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : "NO rating yet",
            // 'ratinga' => $this->reviews,
            'href' =>[
                'reviews' => route('reviews.index',['product'=>$this->id])
            ]
        ];
    }
}
