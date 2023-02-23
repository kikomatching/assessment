<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JournalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $revenue = $this->faker->randomNumber(6, true);
        $labor_cost = $this->faker->randomNumber(4, true);
        $food_cost = $this->faker->randomNumber(3, true);
        $profit = $revenue - $labor_cost - $food_cost;

        return array_merge(compact('revenue', 'labor_cost', 'food_cost', 'profit'), [
            'date' => $this->faker->dateTimeBetween('-5 years', 'yesterday'),
        ]);
    }
}
