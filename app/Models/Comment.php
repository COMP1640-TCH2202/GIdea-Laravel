<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idea_id',
        'user_id',
        'parent_id',
        'content',
        'anonymous',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
