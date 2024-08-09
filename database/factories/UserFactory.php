<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Industry;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserIndustry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genderId = fake()->randomElement([1, 2]);

        return [
            'first_name' => $genderId == 2 ? fake()->firstNameFemale() : fake()->firstNameMale(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email2' => fake()->safeEmail(),
            'email_verified_at' => fake()->dateTime(),
            'date_of_birth' => fake()->date(),
            'gender_id' => $genderId,
            'phone' => fake()->phoneNumber(),
            'phone_alt' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'linkedin' => fake()->url(),
            'country_id' => Country::inRandomOrder()->first()->id ?? null,
            'nationality_id' => Country::inRandomOrder()->first()->id ?? null,
            'nationality2_id' => Country::inRandomOrder()->first()->id ?? null,
            'compensation' => fake()->boolean(),
            'bio' => fake()->text(),
            'interests' => fake()->text(),
            'communication' => fake()->boolean(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'created_at' => fake()->dateTimeBetween("-5 years")
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $industry = Industry::inRandomOrder()->first();
            $skills = Skill::inRandomOrder()->take(rand(1, 5))->pluck('id')->toArray();

            $userIndustry = UserIndustry::create([
                'user_id' => $user->id,
                'industry_id' => $industry->id,
                'years' => $this->faker->numberBetween(1, 10),
                'skill_ids' => $skills,
            ]);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
