<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        // 'name', 'lastname', 'email', 'birthdate', 'course'
        return [
            'name' => $this->faker->firstName($gender = 'male'|'female'),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthdate' => date($format = 'Y-m-d', $endDate = '-15 years'),
            'course' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
        ];
    }

}
