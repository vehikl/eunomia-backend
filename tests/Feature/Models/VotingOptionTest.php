<?php

namespace Tests\Feature\Models;

use App\Models\VotingOption;
use App\Models\VotingSession;
use Tests\TestCase;

class VotingOptionTest extends TestCase
{
    public function test_it_is_associated_with_a_voting_session()
    {
        $votingSession = VotingSession::create([
            'slug' => 'chocolateBar'
        ]);

        $votingOption = VotingOption::factory()->create([
            'name' => 'snickers',
            'voting_session_id' => $votingSession->id
        ]);

        $this->assertSame($votingSession->id, $votingOption->votingSession->id);
    }
}
