<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $doctorName = Doctor::selectRaw("CONCAT(firstName, ' ', lastName) AS fullName")->pluck('fullName')->toArray();
        $doctor = Arr::random($doctorName);
        $status = Doctor::whereRaw("CONCAT(firstName, ' ', lastName) = ?", [$doctor])->value('status');
        
        if ($status === 'In Surgery') {
            return [
                'firstName' => fake()->firstName(),
                'lastName' => fake()->lastName(),
                'floor' => rand(1, 5),
                'room' => rand(1, 10),
                'status' => $status,
                'dateAdmitted' => fake()->dateTimeThisMonth(),
                'doctorName' => $doctor
            ];
        } else {
            return [
                'firstName' => fake()->firstName(),
                'lastName' => fake()->lastName(),
                'floor' => rand(1, 5),
                'room' => rand(1, 10),
                'status' => fake()->randomElement(['Admitted', 'Discharged', 'In Recovery', 'Critical Condition', 'Stable']),
                'dateAdmitted' => fake()->dateTimeThisMonth(),
                'doctorName' => $doctor
            ];
        }
    }
}
