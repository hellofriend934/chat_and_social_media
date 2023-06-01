<?php

namespace App\Supports\Casts;

use App\Supports\ValueObjects\Views;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class ViewsCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): Views
    {
        return Views::make($value, 100);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): int
    {
        if(!$value instanceof Views)
        {
            Views::make($value);
        }
        return $value->raw();
    }
}
