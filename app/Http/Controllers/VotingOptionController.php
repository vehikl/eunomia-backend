<?php

namespace App\Http\Controllers;

use App\Models\VotingOption;
use Illuminate\Http\Request;

class VotingOptionController extends Controller
{
    public function show()
    {

    }

    public function store(Request $request)
    {
        dd('snickers');
        $optionName = $request->input('name');
        $votingOption = VotingOption::create([
            'name' => $optionName,
        ]);

        return response()->json(['votingOption' => $votingOption]);
    }
}
