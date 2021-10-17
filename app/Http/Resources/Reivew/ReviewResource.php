<?php

namespace App\Http\Resources\Reivew;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'star' => $this->star,
            'customer' => $this->customer,
            'review' => $this->review,
            'product_id' => $this->product_id,
            'href'=>[
                'review_show_url' => route('reviews.show',[
                    'product' =>$this->product_id,
                    'review' =>$this->id,
                ])
            ]
        ];
        // return parent::toArray($request);
    }
}
