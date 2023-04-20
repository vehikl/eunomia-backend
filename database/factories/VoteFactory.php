<?php

namespace Database\Factories;

use App\Models\VotingOption;
use App\Models\VotingSession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $votingSession = VotingSession::query()->inRandomOrder()->first();
        $votingOption = VotingOption::query()->inRandomOrder()->first();
        return [
            'voting_option_id' => $votingOption->id,
            'voting_session_id' => $votingSession->id
        ];
    }
}
