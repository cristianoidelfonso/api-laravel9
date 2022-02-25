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
            'birthdate' => $this->faker->dateTimeBetween('-120 years', '-16 years', 'America/Sao_Paulo')->format('Y-m-d'),
            'course' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
        ];
    }

}
