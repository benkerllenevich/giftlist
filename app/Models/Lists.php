<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lists extends Model
{
    use HasUlids;

    protected $fillable = [
        'name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}