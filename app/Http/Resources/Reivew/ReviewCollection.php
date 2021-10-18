<?php

namespace App\Http\Resources\Reivew;

use Illuminate\Http\Resources\Json\Resource;

class ReviewCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($request);
        return [
            'id' => $this->id,
            'customer' => $this->customer,
            'body' => $this->review,
            'star' => $this->star

        ];
    }
}
