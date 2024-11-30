<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasUlids;

    public static array $validationRules = [
        'name' => 'required|string|max:255',
        'url' => 'string|url|max:255',
        'description' => 'string'
    ];

    public function list(): BelongsTo
    {
        return $this->belongsTo(Lists::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
