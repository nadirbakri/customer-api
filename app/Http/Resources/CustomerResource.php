<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title'        => $this->title,
            'name'         => $this->name,
            'gender'       => $this->gender,
            'phone_number' => $this->phone_number,
            'image'        => $this->image,
            'email'        => $this->email,
            'meta'         => [
                'id'           => (string)$this->id,
                'created_at'   => $this->created_at,
                'updated_at'   => $this->updated_at,
            ]
        ];
    }
}
