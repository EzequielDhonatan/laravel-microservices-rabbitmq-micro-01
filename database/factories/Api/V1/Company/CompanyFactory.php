<?php

namespace Database\Factories\Api\V1\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Api\V1\Company\Company;
use App\Models\Api\V1\Category\Category;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'category_id'       => Category::factory()->create(),

            'name'              => $this->faker->unique()->name( 200 ), // name
            'whatsapp'          => $this->faker->unique()->numberBetween( 1000000000, 99999999999 ), // whatsapp
            'email'             => $this->faker->unique()->email(), // email

        ]; // return

    } // definition

} // CompanyFactory
