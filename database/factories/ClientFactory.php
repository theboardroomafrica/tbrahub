<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),  // Ensure the UUID is generated
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'company' => fake()->company(),
            'role' => fake()->jobTitle(),
            'growth_stage' => fake()->randomElement(['Startup', 'Growth', 'Established']),
            'is_founder' => fake()->boolean(),
            'has_board_experience' => fake()->boolean(),
            'direct_reports' => fake()->numberBetween(0, 9999),
            'indirect_reports' => fake()->numberBetween(0, 9999),
            'bio' => fake()->paragraph(),
            'linkedin_url' => fake()->url(),
            'nationality' => fake()->country(),
            'other_nationality' => fake()->optional()->country(),
            'password' => bcrypt('password'),  // Default password for testing
        ];
    }
}
