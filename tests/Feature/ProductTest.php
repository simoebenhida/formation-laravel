<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function testProduct()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('POST','/product');
        
        $response->assertStatus(200);

        $this->assertEquals(\App\Product::all()->count(),1);
    }
}
