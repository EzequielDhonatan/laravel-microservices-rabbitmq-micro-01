<?php

namespace Tests\Feature\Api\V1\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Api\V1\Category\Category;

class CategoryTest extends TestCase
{
    protected $version = 'v1';
    protected $endpoint = 'category';

    public function test_get_all_categories()
    {
        Category::factory()->count( 6 )->create();

        $response = $this->getJson( "{$this->version}/{$this->endpoint}" );

        $response->assertJsonCount( 6, 'data' );
        $response->assertStatus( 200 );
    }

    /**
     * Error Get Single Category
     *
     * @return void
     */
    public function test_error_get_single_category()
    {
        $category = '/fake-url';

        $response = $this->getJson( "{$this->endpoint}/{$category}" );

        $response->assertStatus( 404 );
    }

    /**
     * Get Single Category
     *
     * @return void
     */
    public function test_get_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson( "{$this->version}/{$this->endpoint}/{$category->url}" );

        $response->assertStatus( 200 );
    }

    /**
     * Validation Store Category
     *
     * @return void
     */
    public function test_validations_store_category()
    {
        $response = $this->postJson( "{$this->version}/{$this->endpoint}", [
            'title'         => '',
            'description'   => ''
        ]); //

        $response->assertStatus( 422 );
    }

    /**
     * Store Category
     *
     * @return void
     */
    public function test_store_category()
    {
        $response = $this->postJson( "{$this->version}/{$this->endpoint}", [
            'title'         => 'Title Test',
            'description'   => 'Description Test'
        ]); //

        $response->assertStatus( 201 );
    }

} // CategoryTest
