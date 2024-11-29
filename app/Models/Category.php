<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasUlids;

    public static array $validationRules = [
        'name' => 'required|max:25',
    ];

    protected $fillable = [
        'name',
    ];

    public function lists(): BelongsTo
    {
        return $this->belongsTo(Lists::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
