<?php

namespace App\Observers;

use App\Events\VoteCasted;
use App\Models\Vote;

class VoteObserver
{
    public function created(Vote $vote)
    {
        VoteCasted::dispatch();
    }

    public function deleted(Vote $vote)
    {
        VoteCasted::dispatch();
    }
}
