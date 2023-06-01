<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\group>
 */
class groupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title'=>fake()->words(2,1),
            'description'=>fake()->text(200),
            'creater_id'=>User::query()->inRandomOrder()->value('id'),
            'is_party'=>fake()->boolean(),
            'is_public'=>fake()->boolean(),
        ];
    }
}
