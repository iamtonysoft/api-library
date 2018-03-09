<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Authors extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location
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
