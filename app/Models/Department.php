<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'coordinator_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function coordinator()
    {
        return $this->belongsTo(User::class, 'coordinator_id', 'id');
    }
}
