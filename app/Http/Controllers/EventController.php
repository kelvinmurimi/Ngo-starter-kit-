<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fillable
        $title = 'Events Management';
        $events = Event::all();
        return view('admin.events.index', compact('title', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create
        $title = 'Create Event';
        return view('admin.events.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        //
        $validated = $request->validated();
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('events', 'public');
            // $validated['featured_image'] = $path;
        }
        Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'] ?? null,
            'location' => $validated['location'] ?? null,
            'organizer' => $validated['organizer'] ?? null,
            'featured_image' => $path,
        ]);
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
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
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.events.index')->with('danger', 'Event deleted successfully.');
    }
}
