<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function votingSession() : BelongsTo
    {
        return $this->belongsTo(VotingSession::class);
    }
}
