<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class recipeResource extends JsonResource
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
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'image'       => $this->image,
            'user_id'     => $this->user,
            'category_id' => $this->category_id,
            'status'      => $this->status,
            'created_at'  => $this->created_at
        ];
        
     
    }

    // public function with($res)
    // {
    //     return [
    //         'status' => true,
    //         'message' => 'Recipe list',
    //     ];
    // }
}
