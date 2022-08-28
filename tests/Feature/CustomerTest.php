<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function test_get_all_customer()
    {
        $response = $this->get('/api/customer');

        $response->assertStatus(200);
    }
}
