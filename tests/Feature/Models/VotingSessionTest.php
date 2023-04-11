<?php

namespace Tests\Feature\Models;

use App\Models\VotingOption;
use App\Models\VotingSession;
use Tests\TestCase;

class VotingSessionTest extends TestCase
{
    public function test_it_can_have_a_voting_option()
    {
        $votingSession = VotingSession::factory()->create([
            'slug' => 'chocolate_bar'
        ]);

        VotingOption::factory()->create([
            'name' => 'snickers',
            'voting_session_id' => $votingSession->id
        ]);

        $this->assertCount(1, $votingSession->votingOptions);
    }

    public function test_it_can_have_multiple_voting_options()
    {
        $votingSession = VotingSession::factory()->create([
            'slug' => 'chocolate_bar'
        ]);

        VotingOption::factory(3)->create(['voting_session_id' => $votingSession->id]);

        $this->assertCount(3, $votingSession->votingOptions);
    }
}
