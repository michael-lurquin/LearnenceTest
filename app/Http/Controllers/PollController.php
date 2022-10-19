<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::latest()->get();

        return Inertia::render('Polls/Index', [
            'polls' => $polls,
            'status' => session('status'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Polls/Create');
    }

    public function store(Request $request)
    {
        $request->validate(Poll::$rules);

        $poll = $request->user()->polls()->create([
            'title' => $request->title,
            'publish' => $request->publish,
        ]);

        // Create answers
        $request->collect('answers')->each(function($answer) use($poll) {
            $poll->answers()->create([
                'title' => $answer['title'],
            ]);
        });

        return redirect()->route('polls.index')->with('status', "The poll \"{$poll->title}\" has been successfully created.");
    }

    public function edit(Poll $poll)
    {
        return Inertia::render('Polls/Edit', [
            'poll' => $poll,
        ]);
    }

    public function update(Poll $poll, Request $request)
    {
        $request->validate(Poll::$rules);

        $poll->update([
            'title' => $request->title,
            'publish' => $request->publish,
        ]);

        // Detect if delete one or multiple answers
        $answersToDelete = $poll->answers->pluck('id')->diff($request->collect('answers')->pluck('id'));

        if ( $answersToDelete->isNotEmpty() ) $poll->answers()->whereIn('id', $answersToDelete)->delete();

        // Save answers
        $request->collect('answers')->each(function($answer) use($poll) {
            $poll->answers()->updateOrCreate([
                'id' => $answer['id'],
            ], [
                'title' => $answer['title'],
            ]);
        });

        return redirect()->route('polls.index')->with('status', "The poll \"{$poll->title}\" has been successfully updated.");
    }

    public function destroy(Poll $poll)
    {
        $poll->delete();

        return redirect()->route('polls.index')->with('status', "The poll \"{$poll->title}\" has been successfully deleted.");
    }

    public function clearVotes(Poll $poll)
    {
        $poll->votes()->delete();

        return redirect()->route('polls.index')->with('status', "The \"{$poll->title}\" poll votes have been successfully deleted!");
    }
}
