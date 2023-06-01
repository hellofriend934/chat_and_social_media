<?php

namespace Database\Factories;

use App\Models\group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlockedUserChat>
 */
class BlockedUserChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id'=>User::query()->inRandomOrder()->value('id'),
            'group_id'=>group::query()->inRandomOrder()->value('id'),
        ];
    }
}
