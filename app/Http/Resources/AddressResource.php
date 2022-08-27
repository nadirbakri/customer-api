<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'customer_id' => $this->customer_id,
            'address'     => $this->address,
            'district'    => $this->district,
            'city'        => $this->city,
            'province'    => $this->province,
            'postal_code' => $this->postal_code,
            'meta'        => [
                'id'         => (string)$this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
