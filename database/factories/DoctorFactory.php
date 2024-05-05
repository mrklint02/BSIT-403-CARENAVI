<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
            'specialty' => fake()->unique()->randomElement(['Cardiology', 'Orthopedics','Pediatrics', 'Neurology', 'Oncology', 'Gynecology', 'Dermatology', 'Psychiatry', 'Ophthalmology', 'Gastroenterology', 'Pulmonology', 'Endocrinology', 'Urology', 'Rheumatology', 'Geriatrics']),
            'floor' => rand(1, 5),
            'status' => fake()->randomElement(['Available', 'On Call', 'Off Duty', 'In Surgery', 'In Rounds', 'On Vacation']),
        ];
    }
}
