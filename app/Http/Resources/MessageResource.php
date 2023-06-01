<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'message'=>$this->message !== null ? Crypt::decryptString($this->message) : null,
            'sender_id'=>$this->sender_id,
            'created_at'=>$this->created_at->diffForHumans(),
            'files'=>$this->files,
            'user'=>[
                'id'=>$this->user->id,
                'name'=>$this->user->name,
                'avatar'=>$this->user->profile_photo_path
            ]
        ];
    }
}
