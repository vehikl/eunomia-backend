<?php

use App\Models\Vote;
use App\Models\VotingOption;
use App\Models\VotingSession;

$votingSession = VotingSession::create([
    'slug' => 'snickers'
]);

$option = VotingOption::create([
    'name' => 'snickers'
]);

$vote = Vote::create([
    'voting_session_id' => $votingSession->id,
    'voting_option_id' => $option->id
]);

$option->votingSession()->associate($votingSession->id);

//$votingSession->options()->associate($option->id);
