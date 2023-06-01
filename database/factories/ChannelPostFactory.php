<?php

namespace Database\Factories;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChannelPost>
 */
class ChannelPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'channel_id'=>Channel::query()->inRandomOrder()->value('id'),
            'title'=>fake()->sentence(2,),
            'text'=>fake()->text(200),
            'image'=>fake()->image(),
        ];
    }
}
