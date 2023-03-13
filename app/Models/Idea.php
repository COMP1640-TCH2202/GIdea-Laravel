<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'event_id',
        'title',
        'content',
        'anonymous',
        'votes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votedUsers()
    {
        return $this->belongsToMany(User::class)->withPivot('like');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
