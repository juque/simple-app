<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
					'given_name' => fake()->firstName(),
					'middle_name' => fake()->optional()->firstName(),
					'surname' => fake()->lastName(),
					'date_of_birth' => fake()->date('Y-m-d', '-18 years'),
					'gender' => fake()->randomElement(['male', 'female', 'other']),
					'enrolment_date' => fake()->date(),
        ];
    }
}
