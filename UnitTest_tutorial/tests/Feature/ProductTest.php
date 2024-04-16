<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_homepage_contains_empty_table(): void
    {
        $response = $this->get('/product');

        $response->assertStatus(200);
        $response->assertSee(__(key: 'No products found'));
    }
}
