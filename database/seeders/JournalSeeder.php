<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Journal;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Journal::factory()
            ->count(1000)
            ->state(new Sequence(
                fn($sequence) => [
                    'store_id' => Store::all()->random(),
                ],
            ))
            ->create();
    }
}
