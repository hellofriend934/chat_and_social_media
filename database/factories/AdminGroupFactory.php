<?php

namespace Database\Factories;

use App\Models\ChannelCategory;
use App\Models\group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminGroup>
 */
class AdminGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id'=>group::query()->inRandomOrder()->value('id'),
            'user_id'=>User::query()->inRandomOrder()->value('id'),
        ];
    }
}
