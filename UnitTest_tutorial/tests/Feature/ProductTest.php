<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

// FeatureTest is used for a multiple methods or propperty
// is used by Features

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

    /**
     * A basic feature test product table when non empty.
     */
    public function test_pagination_products_table_doesnt_contain_11th_record(): void
    {
        // You could do it with factory to make multiple records
        // in the create you can override the default values
        $products = Product::factory()->count(11)->create();
        // takes last record
        $lastProduct = $products->last();

        // You can do it with for loop to make multiple records
        //    for ($i = 1;  $i <= 11; $i++) {
        //      // range 
        //      $product = Product::create([
        //         'name' => 'Product 1',
        //         'price' => 100,
        //     ]);
        //    }

        // action 
        $response = $this->get('/product');

        // asserts 
        $response->assertStatus(200);

        // data being passed correctly to the view 
        $response->assertViewHas('products', function ($collection) use ($lastProduct) {
            return !$collection->contains($lastProduct);
        });
    }
}
