<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerDetailResource extends JsonResource
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
            'address'      => $this->addresses,
            'meta'         => [
                'id'           => (string)$this->id,
                'created_at'   => $this->created_at,
                'updated_at'   => $this->updated_at,
            ]
        ];
    }
}
