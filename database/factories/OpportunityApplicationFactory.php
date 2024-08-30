<?php

namespace Database\Factories;

use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use App\Models\OpportunityStage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpportunityApplication>
 */
class OpportunityApplicationFactory extends Factory
{
    protected $model = OpportunityApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $opportunity = Opportunity::whereDoesntHave('applications', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->inRandomOrder()->first();

        return [
            'opportunity_id' => $opportunity?->id,
            'user_id' => $user->id,
            'stage_id' => OpportunityStage::inRandomOrder()->first()?->id,
            'cover_letter' => $this->faker->paragraph(),
        ];
    }
}
