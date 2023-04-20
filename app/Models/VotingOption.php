<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VotingOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function votingSession() : BelongsTo
    {
        return $this->belongsTo(VotingSession::class);
    }

    public function votes() : HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
