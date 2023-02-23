<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

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
}
