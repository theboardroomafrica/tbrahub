<?php

namespace Database\Seeders;

use App\Models\BoardPosition;
use App\Models\Committee;
use App\Models\Country;
use App\Models\Gender;
use App\Models\GrowthStage;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use App\Models\OpportunityStage;
use App\Models\OpportunityType;
use App\Models\RevenueCategory;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        foreach (skills() as $skill) Skill::create(['name' => $skill, "board_skill" => 1]);

        foreach (industries() as $industry) Industry::create(['name' => $industry]);

        foreach (gender() as $gender) Gender::create(['name' => $gender]);

        foreach (interests() as $interest) Interest::create(['name' => $interest]);

        foreach (languages() as $language) Language::create(['name' => $language]);

        foreach (languageProfiencies() as $languageProfiency) LanguageProficiency::create(["name" => $languageProfiency]);

        foreach (boardPositions() as $position) BoardPosition::create(['title' => $position]);

        foreach (committees() as $committee) Committee::create(['name' => $committee]);

        foreach (['Startup', 'Growth', 'Established'] as $name) GrowthStage::create(compact('name'));

        foreach ([1 => "Long list", "Short list", "Interview", "Appointed"] as $k => $stage) OpportunityStage::create(["name" => $stage, "sort" => $k]);

        foreach (["< $100,000", "< $ 500,000", "< $ 1,000,000", "< $ 10,000,000", "< $ 50,000,000", "< $ 100,000,000", "< $ 500,000,000", "Over $ 500,000,000", "N/A"] as $revenue) {
            RevenueCategory::create(["name" => $revenue]);
        }

        foreach (["Non-Executive Director", "Executive Director", "Chairperson", "Committee Chair", "Advisory Board", "Board Advisor"] as $opportunity) {
            OpportunityType::create(["name" => $opportunity]);
        }

        $jsonFile = public_path('countries.json');
        $jsonData = file_get_contents($jsonFile);
        $countries = json_decode($jsonData, true);

        foreach ($countries as $country) {
            Country::create([
                'alpha_2' => $country['alpha_2_code'],
                'alpha_3' => $country['alpha_3_code'],
                'name' => $country['en_short_name'],
                'nationality' => $country['nationality'],
            ]);
        }

        User::factory(10)->create();

        foreach (Opportunity::all() as $opportunity) {
            foreach (User::take(mt_rand(500, 1500))->get() as $user) {
                OpportunityApplication::create([
                    "user_id" => $user->id,
                    "opportunity_id" => $opportunity->id,
                    "stage_id" => mt_rand(1, 3)
                ]);
            }
        }
    }
}
