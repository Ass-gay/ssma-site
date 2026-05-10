<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $events = Event::with('media')->latest()->get();

        return view('admin.events.index', compact('events'));
    }

    // LISTE DES EVENTS (ALBUMS)
    public function vitrine()
    {
        $events = Event::with('media')
            ->latest()
            ->get();

        return view('sections.vitrine.event', compact('events'));
    }

    // DETAIL ALBUM (EVENT)
    public function show($id)
    {
        $event = Event::with('media')
            ->findOrFail($id);

        return view('sections.events.show', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'description' => 'nullable',
            'date_event' => 'nullable',
            'photo' => 'nullable|image'
        ]);

        $data = $request->only([
            'title',
            'type',
            'description',
            'date_event'
        ]);

        // upload image (optionnel)
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event créé avec succès');
    }

}
