<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Speaker;
use App\Models\Eveniment;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        return view('speakers.index', compact('speakers'));
    }

    public function create()
    {
        $events = Eveniment::all();
        return view('organizator.speakers.create', compact('events'));
    }

    public function store(Request $request)
    {
        $speaker = Speaker::create($request->all());
        $speaker->created_by= Auth::guard('organizatori')->id();
        $speaker->save();

        $speaker->evenimente()->attach($request->event_id, ['start_time' => $request->start_time, 'end_time' => $request->end_time]);

        return redirect()->route('organizator.speakers.index');
    }

    public function edit(Speaker $speaker)
    {
        $events = Eveniment::all();
        return view('speakers.edit', compact('speaker', 'events'));
    }

    public function update(Request $request, Speaker $speaker)
    {
        $speaker->update($request->all());

        $speaker->evenimente()->sync([$request->eveniment_id => ['start_time' => $request->start_time, 'end_time' => $request->end_time]]);

        return redirect()->route('speakers.index');
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return redirect()->route('speakers.index');
    }
}