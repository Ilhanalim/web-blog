<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'blog_id'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
