<?php

namespace App\Http\Controllers;

use App\Models\VotingSession;
use Illuminate\Http\Request;

class VotingSessionController extends Controller
{
    public function show($votingSessionSlug)
    {
        return VotingSession::query()->updateOrCreate([
            'slug' => $votingSessionSlug
        ]);
    }
}
