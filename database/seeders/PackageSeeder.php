<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Package::create([
            'id' => Str::uuid(),
            'name' => 'foundation',
            'default_credits' => 10,
            'stripe_plan_id' => 'price_12345',
        ]);

        Package::create([
            'id' => Str::uuid(),
            'name' => 'growth',
            'default_credits' => 20,
            'stripe_plan_id' => 'price_67890',
        ]);

        Package::create([
            'id' => Str::uuid(),
            'name' => 'custom',
            'default_credits' => null,
            'stripe_plan_id' => 'price_custom',
        ]);
    }
}
