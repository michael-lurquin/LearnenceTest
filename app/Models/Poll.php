<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'title',
        'publish',
    ];

    protected $casts = [
        'publish' => 'bool',
    ];

    protected $with = [
        'answers',
        'votes',
    ];

    protected $withCount = [
        'answers',
        'votes',
    ];

    public static $rules = [
        'title' => 'required|string|max:255',
        'publish' => 'boolean',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function hasVoted(User $user)
    {
        return $this->votes()->where('user_id', $user->id)->exists();
    }
}
