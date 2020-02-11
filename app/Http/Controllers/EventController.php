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
        $score1 = $request->post('team1score');
        $score2 = $request->post('team2score');
        $old1 = $event->team1wincoef;
        $old2 = $event->team2wincoef;
        $old_draw = $event->draw_coef;

        $pr1 = 100 / $old1;
        $pr2 = 100 / $old2;
        $pr_draw = 100 / $old_draw;
//        $time_coef = 1 + (Carbon::now()->diffInMinutes($event->start_date) / 20);
        $time_coef = 1.2;
        $koef1 = ($old1 / 2);
        if (($old1*10) % 5 != 0) {
            $koef1 = (floor($old1*2) * 0.5 + 0.5) / 2;
        }

        $koef2 = ($old2 / 2);
        if (($old2*10) % 5 != 0) {
            $koef2 = (floor($old2*2) * 0.5 + 0.5) / 2;
        }

        $koef2 *= $time_coef;
        $koef1 *= $time_coef;
//        $koef1 += 0.2;
//        dd($koef1);
//        $koef2 += 0.2;

        if ($koef1 < 1) {
            $koef1 = 1.2;
        }
        if ($koef2 < 1) {
            $koef2 = 1.2;
        }

        $tm1 = $koef1 - 3.5;
        if ($tm1 > 0) {
            $koef1 -= (floor($tm1) * 0.5) + 1.5;
        }
        $tm2 = $koef2 - 3.5;
        if ($tm2 > 0) {
            $koef2 -= (floor($tm2) * 0.5) + 1.5;
        }

        if ($score1 != $score2) {
            if ($old1 > 15) {
                $koef1 = 1.1;
            }
            if ($old2 > 15) {
                $koef2 = 1.1;
            }
            if ($score1 > $event->score[0]) {
                $new1 = $old1 / $koef1;
                $new2 = $old2 * $koef2;
            } elseif ($score2 > $event->score[2]) {
                $new1 = $old1 * $koef1;
                $new2 = $old2 / $koef2;
            }
            if (abs($score1 - $score2) > abs($event->score[0] - $event->score[2])) {
                $draw_new = $old_draw * (($koef2 + $koef1)/2);
            } else {
                $draw_new = $old_draw / (($koef2 + $koef1)/2);
            }
        } else {
            if ($old1 > $old2) {
                $new1 = $old1 / ($koef1 - 0.5);
                $new2 = $old2 * ($koef2+0.5);
            } else {
                $new1 = $old1 * ($koef1+0.5);
                $new2 = $old2 / ($koef2 - 0.5);
            }
            $draw_new = $old_draw / (($koef2 + $koef1)/1.5 * $time_coef);
        }
        if ($new1 < 1.05) {
            $new1 = 1.05;
        }
        if ($new2 < 1.05) {
            $new2 = 1.05;
        }
        if ($draw_new < 1.05) {
            $draw_new = 1.05;
        }
        if ($new2 > 15) {
            $new1 = 1.05;
        }
        if ($new1 > 15) {
            $new2 = 1.05;
        }

        $new1 = round($new1, 2);
        $new2 = round($new2, 2);
        $draw_new = round($draw_new, 2);
        $score = $score1.':'.$score2;
        $event->score = $score;
        $event->team1wincoef = $new1;
        $event->team2wincoef = $new2;
        $event->draw_coef = $draw_new;
        $event->save();

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
