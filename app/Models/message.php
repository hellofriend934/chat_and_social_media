<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function group()
    {
        return $this->belongsTo(group::class,'group_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id','id','profile_photo_path');
    }
}
