<?php

namespace Database\Factories;

use App\Models\ChannelCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
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
            'category_id'=>ChannelCategory::query()->inRandomOrder()->value('id'),
            'creater_id'=>User::query()->inRandomOrder(1)->value('id'),
        ];
    }
}
