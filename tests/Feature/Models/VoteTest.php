<?php

namespace Tests\Feature\Models;

use App\Events\VoteCasted;
use App\Models\Vote;
use App\Models\VotingOption;
use App\Models\VotingSession;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class VoteTest extends TestCase
{
    public function test_votes_attach_to_session()
    {
        $votingSession = VotingSession::create([
            'slug' => 'chocolateBar'
        ]);

        $snickersVotingOption = VotingOption::factory()->create([
            'name' => 'snickers',
            'voting_session_id' => $votingSession->id,
        ]);

        $marsBarVotingOption = VotingOption::factory()->create([
            'name' => 'mars',
            'voting_session_id' => $votingSession->id,
        ]);

        $marsBarVote = Vote::factory()->create([
            'voting_session_id' => $votingSession->id,
            'voting_option_id' => $marsBarVotingOption->id,
        ]);
        $snickersVote = Vote::factory()->create([
            'voting_session_id' => $votingSession->id,
            'voting_option_id' => $snickersVotingOption->id,
        ]);

        $this->assertCount(2, $votingSession->votes);
    }

    public function test_it_dispatches_vote_casted_event_on_create()
    {
        Event::fake();

        $votingSession = VotingSession::create([
            'slug' => 'chocolateBar'
        ]);

        $snickersVotingOption = VotingOption::factory()->create([
            'name' => 'snickers',
            'voting_session_id' => $votingSession->id,
        ]);

        $marsBarVote = Vote::factory()->create([
            'voting_session_id' => $votingSession->id,
            'voting_option_id' => $snickersVotingOption->id,
        ]);

        Event::assertDispatched(VoteCasted::class);
    }
}
