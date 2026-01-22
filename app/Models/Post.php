<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
        'in_reply_to_post_id',
        'quoted_post_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'in_reply_to_post_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Post::class, 'in_reply_to_post_id');
    }

    public function quotedPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'quoted_post_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
