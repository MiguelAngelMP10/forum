<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'reply_id',
        'body'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
