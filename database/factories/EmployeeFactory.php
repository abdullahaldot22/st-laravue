<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "designation" => fake()->jobTitle(),
            "phone" => fake()->e164PhoneNumber(),
            "date_of_birth" => fake()->dateTimeBetween(
                "-60 years",
                "-19 years"
            ),
            "joining_date" => fake()->dateTimeBetween("-6 years", "now"),
            "timezone" => fake()->timezone(),
            "street" => fake()->streetName(),
            "address" => fake()->address(),
            "city" => fake()->city(),
            "username" => fake()->userName(),
            "email_verified_at" => fake()->dateTime(),
            "password" =>
                '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            "remember_token" => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(
            fn(array $attributes) => [
                "email_verified_at" => null,
            ]
        );
    }
}
