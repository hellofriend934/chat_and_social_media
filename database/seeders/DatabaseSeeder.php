<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BlockedUserChat;
use App\Models\Channel;
use App\Models\ChannelCategory;
use App\Models\ChannelPost;
use App\Models\follower;
use App\Models\group;
use App\Models\message;
use App\Models\User;
use Database\Factories\AdminGroupFactory;
use Database\Factories\BlockedUserChatFactory;
use Database\Factories\ChannelCategoryFactory;
use Database\Factories\ChannelFactory;
use Database\Factories\ChannelPostFactory;
use Database\Factories\followerFactory;
use Database\Factories\groupFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->count(10)->create();
       $users = collect();
       $users->push(User::query()->inRandomOrder()->value('id'));
       $users->push(User::query()->inRandomOrder()->value('id'));
       $users->push(User::query()->inRandomOrder()->value('id'));
       $j_users = json_encode($users);
         groupFactory::new()->count(10)->create(['users'=>$j_users]);

         ChannelCategoryFactory::new()->count(10)->create();

         ChannelFactory::new()->count(10)->create();

         ChannelPostFactory::new()->count(10)->create();

         followerFactory::new()->count(10)->create();

         BlockedUserChatFactory::new()->count(10)->create();

         AdminGroupFactory::new()->count(4)->create();
    }
}
