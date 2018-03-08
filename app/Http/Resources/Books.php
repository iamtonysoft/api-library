<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Books extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'isbn' => $this->isbn,
            'author' => $this->author,
            'publisher' => $this->publisher,
        ];
    }

    public function with($request) 
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('https://iamtonysoft.github.io/')
        ];
    }
}
