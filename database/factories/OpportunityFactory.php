<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Opportunity;
use App\Models\OpportunityType;
use App\Models\RevenueCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    protected $model = Opportunity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => fake()->randomElement(boardPositions()),
            'company' => $this->faker->company(),
            'website' => $this->faker->url(),
            'employees' => $this->faker->numberBetween(1, 50),
            'info' => $this->faker->paragraph(),
            'client_id' => Client::where('isApproved', true)->inRandomOrder()->first()->id,
            'revenue_id' => RevenueCategory::inRandomOrder()->first()?->id,
            'type_id' => OpportunityType::inRandomOrder()->first()?->id,
            'deadline' => fake()->dateTimeBetween('-10 days', '+30 days'),
            'isOpen' => mt_rand(0, 1),
        ];
    }
}
