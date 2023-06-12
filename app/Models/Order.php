<?php

namespace App\Models;

use App\Enums\OrderStatuses;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'price',
        'email',
        'cvc',
        'card_number',
        'credit-expiry',
    ];
    protected $attributes = [
        'status' => 'new'
    ];

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => OrderStatuses::from($value)->createState($this)
        );
    }

}
