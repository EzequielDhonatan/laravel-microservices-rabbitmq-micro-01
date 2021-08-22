<?php

namespace Tests\Feature\Api\V1\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Api\V1\Category\Category;

class CategoryTest extends TestCase
{
    /**
     * Get all categories;
     *
     * @return void
     */
    public function test_get_all_categories()
    {
        Category::factory()->count( 6 )->create();

        $response = $this->getJson( '/v1/category' ); //

        // $response->dump(); //
        $response->assertJsonCount( 6, 'data'  ); //

        $response->assertStatus( 200 ); //
    }

} // CategoryTest
