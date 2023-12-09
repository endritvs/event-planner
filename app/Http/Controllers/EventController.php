<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('user')->latest()->paginate();
        return view('events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        Event::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'location'=>$request->location
        ]);
        return view('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->user_id = Auth::user()->id;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->update();
        
        return view('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return to_route('events.index');
    }
}
