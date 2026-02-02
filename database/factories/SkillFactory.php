<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
        'Laravel', 'Vue.js', 'React', 'PHP', 'MySQL', 'Anglais','Gestion de projet', 
           'Java', 'Spring Boot',
            'JavaScript', 'Vue.js', 'React',
            'Python', 'Django',
            'PostgreSQL',
            'Docker', 'Git', 'Linux',
            'HTML', 'CSS', 'Tailwind'
         ]),
        ];
    }
}
