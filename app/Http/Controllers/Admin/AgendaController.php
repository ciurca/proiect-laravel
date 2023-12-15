<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Speaker;
use App\Models\Eveniment;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    # Vizualizarea tuturor speakerilor asociati
    public function index()
    {
        $speakers = Speaker::where('created_by', Auth::guard('organizatori')->id())->get();
        return view('organizator.speakers.agenda', compact('speakers'));
    }
    # Crearea agendei (asocierea speakerilor cu evenimentele)
    public function create() 
    {
        $userId = Auth::guard('organizatori')->id();
        $events = Eveniment::where('organizator_id', $userId)->get();
        $speakers = Speaker::where('created_by', $userId)->get();
        
        return view('organizator.speakers.create_agenda', compact('events', 'speakers'));
    }
    # Asocierea speakerilor cu evenimentele
    public function store(Request $request)
    {
        $speakerId = $request->get('speaker_id');
        $eventId = $request->get('event_id');
        $startTime = $request->get('start_time');
        $endTime = $request->get('end_time');

        $speaker = Speaker::find($speakerId);

        if ($speaker) {
            $speaker->evenimente()->attach($eventId, ['start_time' => $startTime, 'end_time' => $endTime]);
        }

        return redirect()->route('admin.agenda.index');
    }
    # Afisarea formularului de editare a agendei
    public function edit($id)
    {
        $userId = Auth::guard('organizatori')->id();
        $events = Eveniment::where('organizator_id', $userId)->get();

        // Get the first speaker that is associated with the given id in the intersection table
        $speaker = Speaker::where('created_by', $userId)->whereHas('evenimente', function ($query) use ($id) {
            $query->where('event_speaker.id', $id);
        })->first();

        if (!$speaker) {
            return redirect()->route('admin.agenda.index');
        }

        return view('organizator.speakers.edit_agenda', compact('events', 'speaker'));
    }
    # Actualizarea agendei in baza de date
    public function update(Request $request, $id)
    {
        $speakerId = $request->get('speaker_id');
        $eventId = $request->get('event_id');
        $startTime = $request->get('start_time');
        $endTime = $request->get('end_time');

        $speaker = Speaker::find($speakerId);

        if ($speaker) {
            $speaker->evenimente()->sync([$eventId => ['start_time' => $startTime, 'end_time' => $endTime]]);
        }

        return redirect()->route('admin.agenda.index');
    }
    # Stergerea unei intrari din tabelul pivot event_speaker
    public function destroy($id)
    {
        $eventId = request()->input('event_id');
        Eveniment::find($eventId)->speakeri()->wherePivot('id','=',$id)->detach();

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda deleted successfully.');
    }
}