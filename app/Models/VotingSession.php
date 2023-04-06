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
        return $this->hasMany(Option::class, 'id', 'id');
    }
}
