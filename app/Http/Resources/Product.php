<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        // $this->resource->toArray();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'category' => new CategoryCollection($this->category()->get())
        ];
    }

    // public function with($request)
    // {
    //     return [
    //         'data' => [
    //             'normal' => 'ok'
    //         ]
    //     ];
    // }
}
