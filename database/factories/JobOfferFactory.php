<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->company(),
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(4),
            'contract_type' => fake()->randomElement(['CDI', 'CDD', 'Stage', 'Freelance']),
            'image' => 'offers/default.png',
        ];
    }
}
