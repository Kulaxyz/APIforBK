<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::where('finished_at', null)->paginate(10);

        return view('home', compact('events'));
    }

    public function finished_events()
    {
        $events = Event::where('finished_at', '!=', null)->paginate(10);

        return view('finished', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $event = Event::create($request->all());
        //TODO: fire event send API request
        return json_encode($event);
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function edit(Event $event)
    {
        return view('edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->all());
        //TODO: fire event send API request


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }

    public function score(Event $event)
    {
        $score = explode(':', $event->score);
        $team1score = $score[0];
        $team2score = $score[1];

        return view('score', compact('event', 'team1score', 'team2score'));
    }

    public function update_score(Request $request, Event $event)
    {
        $score = $request->post('team1score').':'.$request->post('team2score');
        $event->score = $score;
        $event->save();
        //TODO: fire event send API request
        return redirect()->back();
    }

    public function finish(Event $event)
    {
        $event->finished_at = Carbon::now();
        $event->save();
        //TODO: fire event send API request
        return redirect()->route('index');

    }
}
