<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Inertia\Inertia;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $polls = Poll::wherePublish(true)->latest('updated_at')->get();

        return Inertia::render('Votes/Index', [
            'polls' => $polls->transform(function(Poll $poll) {
                $poll->voted = $poll->hasVoted(auth()->user());
                return $poll;
            }),
            'status' => session('status'),
        ]);
    }

    public function show(Poll $poll)
    {
        return Inertia::render('Votes/Show', [
            'poll' => $poll,
        ]);
    }

    public function voteForPoll(Poll $poll, Request $request)
    {
        $poll->votes()->create([
            'poll_id' => $poll->id,
            'answer_id' => $request->answer_id,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('votes.index')->with('status', "Your vote in the \"{$poll->title}\" poll was well received!");
    }
}
