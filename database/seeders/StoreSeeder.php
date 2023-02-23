<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::factory()
            ->count(100)
            ->state(new Sequence(
                fn($sequence) => [
                    'brand_id' => Brand::all()->random(),
                    'user_id' => User::all()->random(),
                ],
            ))
            ->create();
    }
}
