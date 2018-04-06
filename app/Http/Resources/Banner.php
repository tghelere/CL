<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Banner extends JsonResource
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
            'id' => $this->id,
            'page' => $this->page,
            'status' => $this->status,
            'image' => $this->image,
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'colorbox' => $this->colorbox,
        ];
    }

    public function with($request){
        return [
            'version' => '1.0.0',
            'author' => 'Softhing.com.br <ghelere@outlook.com>'
        ];
    }
}
