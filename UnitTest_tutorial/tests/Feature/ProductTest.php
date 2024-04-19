<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;
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
        // range 
        $product = Product::create([
            'name' => 'Product 1',
            'price' => 100,
        ]);

        // action 
        $response = $this->get('/product');

        // asserts 
        $response->assertStatus(200);
        $response->assertDontSee(__(key: 'No products found'));
        // the text is correct
        $response->assertSee(value: 'Product 1');
        // data being passed correctly to the view 
        $response->assertViewHas('products', function ($collection) use ($product) {
            return $collection->contains($product);
        });
    }
}
