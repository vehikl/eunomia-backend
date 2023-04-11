<?php

namespace App\Http\Controllers;

use App\Models\VotingSession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VotingSessionController extends Controller
{
    public function show($votingSessionSlug): JsonResponse
    {
        $votingSession = VotingSession::query()->firstOrCreate(['slug' => $votingSessionSlug]);
        return response()->json(['voting_session' => $votingSession]);
    }

    public function winner(VotingSession $votingSession): JsonResponse
    {
        $mostVotedOption = $votingSession->votingOptions()
            ->withCount('votes')
            ->orderByDesc('votes_count')
            ->first();

        return response()->json([
            'voting_session' => $votingSession,
            'most_voted_option' => $mostVotedOption,
        ]);
    }
}
