<?php

namespace App\Models;

use App\Enums\ListVisibility;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lists extends Model
{
    use HasUlids;

    public static array $validationRules = [
        'name' => 'required|min:5|max:25',
    ];

    protected $fillable = [
        'name',
    ];

    protected function casts(): array
    {
        return [
            'visibility' => ListVisibility::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
