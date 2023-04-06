<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VotingSession extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function options() : HasMany
    {
        return $this->hasMany(VotingOption::class, 'id', 'id');
    }

    public function votes() : HasMany
    {
        return $this->hasMany(Vote::class, 'id', 'id');
    }
}
