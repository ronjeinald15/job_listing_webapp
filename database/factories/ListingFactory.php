<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->jobTitle(),
            'tags' => 'Laravel, Javascript, API, Backend',
            'company' => fake()->company(),
            'email' => fake()->email(),
            'website' => fake()->domainName(),
            'location' => fake()->city(),
            'description' => fake()->paragraph()
        ];
    }
}
