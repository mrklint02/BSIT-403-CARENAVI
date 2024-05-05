<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'floor' => rand(1, 5),
            'room' => rand(1, 10),
            'status' => fake()->randomElement(['Admitted', 'Discharged', 'In Surgery', 'In Recovery', 'Critical Condition', 'Stable']),
            'dateAdmitted' => fake()->dateTimeThisMonth(),
            'doctorName' => fake()->name()
        ];
    }
}
