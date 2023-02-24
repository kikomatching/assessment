<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OwnersCanListTheirStoresTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_owners_can_list_their_stores()
    {
        $this->seed();

        $user = User::inRandomOrder()->first();

        $this->actingAs($user);

        $response = $this->json('GET', route('stores.index'));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'brand_id',
                    'number', 
                    'address',
                    'city',
                    'state',
                    'zip_code',
                    'created_at',
                    'updated_at',
                    'user_id'
                ]
            ],
        ]);
    }
}
