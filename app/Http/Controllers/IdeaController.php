<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Http\Resources\Idea\IdeaResource;
use App\Models\Event;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Idea::class, 'ideas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\IdeaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdeaRequest $request)
    {
        $input = $request->validated();
        $latestEvent = Event::latest()->first();
        return new IdeaResource(Idea::create([
            'title' => $input['title'],
            'content' => $input['content'],
            'anonymous' => $input['anonymous'],
            'event_id' => $latestEvent->id,
            'user_id' => Auth::user()['id']
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\IdeaRequest  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
