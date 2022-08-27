<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;

class AddressController extends Controller
{
    public function store(AddressRequest $request)
    {
        $address = Address::create([
            'customer_id' => $request->customer_id,
            'address'     => $request->address,
            'district'    => $request->district,
            'city'        => $request->city,
            'province'    => $request->province,
            'postal_code' => $request->postal_code,
        ]);

        return new AddressResource($address);
    }

    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->update([
            'customer_id' => $request->customer_id,
            'address'     => $request->address,
            'district'    => $request->district,
            'city'        => $request->city,
            'province'    => $request->province,
            'postal_code' => $request->postal_code,
        ]);

        return new AddressResource($address);
    }


    public function destroy($id)
    {
        Address::destroy($id);
        return response('Data deleted successfully', 204)
                  ->header('Content-Type', 'application/json');
    }
}
