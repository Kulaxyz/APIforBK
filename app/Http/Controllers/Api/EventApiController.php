<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::where('finished_at', null)->get();

        return response()->json($events, 200);
    }

    public function single($id)
    {
        $event = Event::findOrFail($id);

        return response()->json($event, 200);
     }

    public function score($id)
    {
        $event = Event::findOrFail($id);

        return response()->json($event->score, 200);
    }

}
