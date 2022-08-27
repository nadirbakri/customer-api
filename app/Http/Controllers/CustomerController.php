<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerDetailResource;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::orderBy('name')->get());
    }

    public function store(CustomerRequest $request)
    {
        $customer = Customer::create([
            'title'        => $request->title,
            'name'         => $request->name,
            'gender'       => $request->gender,
            'phone_number' => $request->phone_number,
            'image'        => $request->image,
            'email'        => $request->email
        ]);

        return new CustomerResource($customer);
    }

    public function show($id)
    {
        return new CustomerDetailResource(Customer::findOrFail($id));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'title'        => $request->title,
            'name'         => $request->name,
            'gender'       => $request->gender,
            'phone_number' => $request->phone_number,
            'image'        => $request->image,
            'email'        => $request->email,
        ]);

        return new CustomerResource($customer);
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return response('Data deleted successfully', 204)
                  ->header('Content-Type', 'application/json');
    }
}
