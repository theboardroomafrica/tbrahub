<?php

namespace Database\Seeders;

use App\Models\BoardPosition;
use App\Models\Committee;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\Language;
use App\Models\LanguageProficiency;
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
    }
}
