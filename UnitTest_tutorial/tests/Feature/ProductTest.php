<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test product table when empty.
     */
    public function test_homepage_contains_empty_table(): void
    {
        $response = $this->get('/product');

        $response->assertStatus(200);
        $response->assertSee(__(key: 'No products found'));
    }

    /**
     * A basic feature test product table when non empty.
     */
    public function test_homepage_contains_non_empty_table(): void
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 100,
        ]);

        $response = $this->get('/product');

        $response->assertStatus(200);
        $response->assertDontSee(__(key: 'No products found'));
    }
}
