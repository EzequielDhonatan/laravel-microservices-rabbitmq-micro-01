<?php

namespace Database\Factories\Api\V1\Category;

use App\Models\Api\V1\Category\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title'             => $this->faker->name(), // tiitle
            'description'       => $this->faker->sentence( 200 ) // description


        ]; // return

    } // definition

} // CategoryFactory
