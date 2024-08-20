<?php

namespace Database\Factories;

use App\Models\Achievement;
use App\Models\BoardExperience;
use App\Models\BoardPosition;
use App\Models\Committee;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\ProfessionalExperience;
use App\Models\Recognition;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserIndustry;
use App\Models\UserSkill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
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
            'title' => fake()->jobTitle,
            'address' => fake()->address,
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
                'years' => fake()->numberBetween(1, 10),
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
                    'position' => fake()->jobTitle(),
                    'organization' => fake()->company(),
                    'location' => fake()->city(),
                    'start_date' => fake()->date(),
                    'end_date' => fake()->optional()->date(),
                    'description' => fake()->paragraph(),
                ]);
            }

            foreach (range(1, 3) as $index) {
                $position = BoardPosition::inRandomOrder()->first();

                $boardExperience = BoardExperience::create([
                    'user_id' => $user->id,
                    'position_id' => $position->id,
                    'organization' => fake()->company(),
                    'location' => fake()->city(),
                    'start_date' => fake()->date(),
                    'end_date' => fake()->optional()->date(),
                    'description' => fake()->paragraph(),
                    'non_profit' => fake()->boolean(),
                    'publicly_listed' => fake()->boolean(),
                    'paid_appointment' => fake()->boolean(),
                    'website' => fake()->optional()->url(),
                ]);

                $committees = Committee::inRandomOrder()->take(rand(1, 3))->get();
                foreach ($committees as $committee) {
                    $boardExperience->committees()->attach($committee->id, [
                        'chair' => $this->faker->boolean,
                    ]);
                }
            }

            foreach (range(1, 3) as $index) {
                Recognition::create([
                    'user_id' => $user->id,
                    'award' => ucfirst(fake()->words(3, true)),
                    'organization' => fake()->company(),
                    'year' => fake()->year(),
                ]);
            }

            foreach (range(1, 3) as $index) {
                Achievement::create([
                    'user_id' => $user->id,
                    'title' => ucfirst(fake()->words(3, true)),
                    'description' => fake()->paragraph(),
                    'date' => fake()->date(),
                ]);
            }

            $boardSkills = Skill::where('board_skill', true)
                ->inRandomOrder()
                ->take(rand(1, 5))
                ->get();

            foreach ($boardSkills as $skill) {
                UserSkill::create([
                    'user_id' => $user->id,
                    'skill_id' => $skill->id,
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
