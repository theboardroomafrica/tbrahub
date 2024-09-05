<?php

namespace Database\Factories;

use App\Models\Opportunity;
use App\Models\OpportunityConnection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpportunityConnection>
 */
class OpportunityConnectionFactory extends Factory
{
    protected $model = OpportunityConnection::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'opportunity_id' => Opportunity::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'contacted_at' => $this->faker->optional()->dateTime(), // Some connections will not be contacted (null)
            'status' => function (array $attributes) {
                return $attributes['contacted_at'] ? $this->faker->randomElement([null, true, false]) : null;
            },
        ];
    }
}
