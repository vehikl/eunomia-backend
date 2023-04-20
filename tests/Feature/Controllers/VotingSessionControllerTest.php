<?php

namespace Tests\Feature\Controllers;

use App\Models\Vote;
use App\Models\VotingOption;
use App\Models\VotingSession;
use Tests\TestCase;

class VotingSessionControllerTest extends TestCase
{
    public function test_it_can_create_voting_sessions()
    {
        $this->get(route('votingSession.show', ['snickers']));

        $this->assertDatabaseHas('voting_sessions', [
            'slug' => 'snickers'
        ]);
    }

    public function test_it_can_get_most_voted_option_for_a_session()
    {
        $votingSession = VotingSession::factory()->create();

        $votingOptions = VotingOption::factory(3)->create([
            'voting_session_id' => $votingSession->id,
        ]);

        Vote::factory(3)->create([
            'voting_session_id' => $votingSession->id,
            'voting_option_id' => $votingOptions[0]->id,
        ]);

        Vote::factory(2)->create([
            'voting_session_id' => $votingSession->id,
            'voting_option_id' => $votingOptions[1]->id,
        ]);

        Vote::factory(1)->create([
            'voting_session_id' => $votingSession->id,
            'voting_option_id' => $votingOptions[2]->id,
        ]);

        $this->get(route('votingSession.winner', $votingSession->id))
            ->assertSuccessful()
            ->assertJsonFragment([
                'voting_session' => $votingSession->toArray(),
                'most_voted_option' => array_merge(
                    $votingOptions[0]->toArray(),
                    [
                        'votes_count' => Vote::query()->where('voting_option_id', $votingOptions[0]->id)->count()
                    ]
                ),
            ]);
    }
}
