<?php

namespace Tests\Feature\Api\V1\Company;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Api\V1\Company\Company;
use App\Models\Api\V1\Category\Category;

class CompanyTest extends TestCase
{
    protected $version = 'v1';
    protected $endpoint = 'company';

    /**
     * Get All Companies
     *
     * @return void
     */
    public function test_get_all_companies()
    {
        Company::factory()->count( 6 )->create();

        $response = $this->getJson( "{$this->version}/{$this->endpoint}" );

        $response->assertJsonCount( 6, 'data' );
        $response->assertStatus( 200 );
    }

    /**
     * Error Get Single Company
     *
     * @return void
     */
    public function test_error_get_single_company()
    {
        $company = '/fake-uuid';

        $response = $this->getJson( "{$this->endpoint}/{$company}" );

        $response->assertStatus( 404 );
    }

    /**
     * Get Single Company
     *
     * @return void
     */
    public function test_get_single_company()
    {
        $company = Company::factory()->create();

        $response = $this->getJson( "{$this->version}/{$this->endpoint}/{$company->uuid}" );

        $response->assertStatus( 200 );
    }

    /**
     * Validation Store Company
     *
     * @return void
     */
    public function test_validations_store_company()
    {
        $response = $this->postJson( "{$this->version}/{$this->endpoint}", [
            'title'         => '',
            'description'   => ''
        ]); //

        $response->assertStatus( 422 );
    }

    /**
     * Store Company
     *
     * @return void
     */
    public function test_store_company()
    {
        $category = Category::factory()->create();

        $response = $this->postJson( "{$this->version}/{$this->endpoint}", [
            'category_id'   => $category->id,
            'name'          => 'Ezequiel Dhonatan',
            'whatsapp'      => '(61) 9 9999-9999',
            'email'         => 'Contato@ezequieldhonatan.com.br'
        ]); //

        $response->assertStatus( 201 );
    }

    /**
     * Update Company
     *
     * @return void
     */
    public function test_update_company()
    {
        $category   = Category::factory()->create();
        $company    = Company::factory()->create();

        $data = [
            'category_id'   => $category->id,
            'name'          => 'Ezequiel Dhonatan (Updated)',
            'whatsapp'      => '(61) 9999-9999',
            'email'         => 'Contato@ezequieldhonatan.com.br'
        ]; //

        // Not found
        $response = $this->putJson( "{$this->version}/{$this->endpoint}/fake-company", $data ) ;
        $response->assertStatus( 404 );

        // Validation
        $response = $this->putJson( "{$this->version}/{$this->endpoint}/{$company->uuid}", [] );
        $response->assertStatus( 422 );

        // Update
        $response = $this->putJson( "{$this->version}/{$this->endpoint}/{$company->uuid}", $data );
        $response->assertStatus( 200 );
    }

    /**
     * Destroy Company
     *
     * @return void
     */
    public function test_destroy_company()
    {;
        $company    = Company::factory()->create();

        // Not found
        $response = $this->deleteJson( "{$this->version}/{$this->endpoint}/fake-company" ) ;
        $response->assertStatus( 404 );

        // Delete
        $response = $this->deleteJson( "{$this->version}/{$this->endpoint}/{$company->uuid}" );
        $response->assertStatus( 204 );
    }

} // CompanyTest
