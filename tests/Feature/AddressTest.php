<?php

namespace Tests\Feature;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    public function test_update_data_address()
    {
        $response = $this->patch('/api/address/3', [
            "customer_id" => 4,
            "address"     => "Jalan Bogor",
            "district"    => "Tanah Abang",
            "city"        => "Palembang",
            "province"    => "Papua",
            "postal_code" => 121224
        ]);

        $response->assertStatus(200);

        $address = Address::orderBy('updated_at', 'DESC')->first();

        $this->assertEquals(4, $address->customer_id);
        $this->assertEquals('Jalan Bogor', $address->address);
        $this->assertEquals('Tanah Abang', $address->district);
        $this->assertEquals('Palembang', $address->city);
        $this->assertEquals('Papua', $address->province);
        $this->assertEquals(121224, $address->postal_code);
    }

    public function test_create_new_address()
    {
        $response = $this->post('/api/address', [
            "customer_id" => 4,
            "address"     => "Jalan Bogor",
            "district"    => "Cilebut",
            "city"        => "Bogor",
            "province"    => "Jawa Barat",
            "postal_code" => 11111
        ]);

        $response->assertStatus(201);

        $address = Address::orderBy('created_at', 'DESC')->first();

        $this->assertEquals(4, $address->customer_id);
        $this->assertEquals('Jalan Bogor', $address->address);
        $this->assertEquals('Cilebut', $address->district);
        $this->assertEquals('Bogor', $address->city);
        $this->assertEquals('Jawa Barat', $address->province);
        $this->assertEquals(11111, $address->postal_code);
    }

    public function test_failed_to_update_data_address()
    {
        $response = $this->patch('/api/address/1', [
            'address'        => 'Jalan Bogor'
        ]);

        $response->assertInvalid(['customer_id', 'district', 'city','province','postal_code']);
    }

    public function test_failed_to_create_data_address()
    {
        $response = $this->post('/api/address', [
            'address'        => 'Jalan Bogor'
        ]);

        $response->assertInvalid(['customer_id', 'district', 'city','province','postal_code']);
    }

    public function test_delete_data_address()
    {
        $response = $this->delete('/api/address/7');

        $response->assertStatus(204);
    }
}
