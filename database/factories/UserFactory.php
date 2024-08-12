<?php

namespace Database\Factories;

use App\Models\BoardExperience;
use App\Models\BoardPosition;
use App\Models\Committee;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\ProfessionalExperience;
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

            $interests = Interest::inRandomOrder()->limit(3)->pluck('id');
            $user->interests()->attach($interests);

            $languages = Language::inRandomOrder()->take(3)->get();

            foreach ($languages as $language) {
                $user->languages()->create([
                    'language_id' => $language->id,
                    'written_proficiency_id' => LanguageProficiency::inRandomOrder()->first()->id,
                    'spoken_proficiency_id' => LanguageProficiency::inRandomOrder()->first()->id,
                ]);
            }

            foreach (range(1, 3) as $i) {
                ProfessionalExperience::create([
                    'user_id' => $user->id,
                    'position' => $this->faker->jobTitle(),
                    'organization' => $this->faker->company(),
                    'location' => $this->faker->city(),
                    'start_date' => $this->faker->date(),
                    'end_date' => $this->faker->optional()->date(),
                    'description' => $this->faker->paragraph(),
                ]);
            }

            foreach (range(1, 3) as $index) {
                $committees = Committee::inRandomOrder()->take(3)->pluck('id')->toArray();
                $position = BoardPosition::inRandomOrder()->first();

                BoardExperience::create([
                    'user_id' => $user->id,
                    'position_id' => $position->id,
                    'organization' => $this->faker->company(),
                    'location' => $this->faker->city(),
                    'start_date' => $this->faker->date(),
                    'end_date' => $this->faker->optional()->date(),
                    'description' => $this->faker->paragraph(),
                    'non_profit' => $this->faker->boolean(),
                    'publicly_listed' => $this->faker->boolean(),
                    'paid_appointment' => $this->faker->boolean(),
                    'website' => $this->faker->optional()->url(),
                    'committee_ids' => $committees,
                ]);
            }
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
