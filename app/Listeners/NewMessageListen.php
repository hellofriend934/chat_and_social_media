<?php

namespace App\Listeners;

use App\Events\NewMessageEvent;
use App\Models\group;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewMessageListen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewMessageEvent $event): void
    {
        $users = collect(json_decode(group::query()->where('id',$event->group_id)->select('users')->first()));
        if ($users->contains(auth()->id()) && !request()->route('messenger')){
            session()->put('new_message', $event->message);
        }
    }
}
