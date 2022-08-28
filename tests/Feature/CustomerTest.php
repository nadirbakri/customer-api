<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function test_update_data_customer()
    {
        $response = $this->patch('/api/customer/7', [
            'title'        => 'Tc.',
            'name'         => 'Test Case Update',
            'gender'       => 'T',
            'phone_number' => '081212121221',
            'image'        => 'tc.jpg',
            'email'        => 'tc@test.com'
        ]);

        $response->assertStatus(200);

        $customer = Customer::orderBy('updated_at', 'DESC')->first();

        $this->assertEquals('Tc.', $customer->title);
        $this->assertEquals('Test Case Update', $customer->name);
        $this->assertEquals('T', $customer->gender);
        $this->assertEquals('081212121221', $customer->phone_number);
        $this->assertEquals('tc.jpg', $customer->image);
        $this->assertEquals('tc@test.com', $customer->email);
    }

    public function test_create_new_customer()
    {
        $response = $this->post('/api/customer', [
            'title'        => 'Tc.',
            'name'         => 'Test Case',
            'gender'       => 'T',
            'phone_number' => '081212121221',
            'image'        => 'tc.jpg',
            'email'        => 'tc@test.com'
        ]);

        $response->assertStatus(201);

        $customer = Customer::orderBy('created_at', 'DESC')->first();

        $this->assertEquals('Tc.', $customer->title);
        $this->assertEquals('Test Case', $customer->name);
        $this->assertEquals('T', $customer->gender);
        $this->assertEquals('081212121221', $customer->phone_number);
        $this->assertEquals('tc.jpg', $customer->image);
        $this->assertEquals('tc@test.com', $customer->email);
    }

    public function test_failed_to_update_data_customer()
    {
        $response = $this->patch('/api/customer/1', [
            'title'        => 'Tc.'
        ]);

        $response->assertInvalid(['name', 'gender', 'phone_number','image','email']);
    }

    public function test_failed_to_create_data_customer()
    {
        $response = $this->post('/api/customer', [
            'title'        => 'Tc.'
        ]);

        $response->assertInvalid(['name', 'gender', 'phone_number','image','email']);
    }

    public function test_get_all_customer()
    {
        $response = $this->get('/api/customer');

        $response->assertStatus(200);
    }

    public function test_get_one_customer()
    {
        $response = $this->get('/api/customer/1');

        $response->assertStatus(200);
    }

    public function test_delete_data_customer()
    {
        $response = $this->delete('/api/customer/10');

        $response->assertStatus(204);
    }
}
