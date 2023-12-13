<?php
namespace App\Http\Controllers\Admin;

use App\Models\Eveniment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    // ...
    public function index()
    {
        $eveniments = Eveniment::where('organizator_id', Auth::id())->get();
        return view('admin.events.index', compact('eveniments'));
    }

    public function create()
    {
        return view('organizator.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
            'data_inceput' => 'required',
            'data_sfarsit' => 'required',
            'locatie' => 'required',
            // validate other fields here
        ]);

        $eveniment = new Eveniment();
        $eveniment->titlu = $request->titlu;
        $eveniment->descriere = $request->descriere;
        $eveniment->data_inceput = $request->data_inceput;
        $eveniment->data_sfarsit = $request->data_sfarsit;
        $eveniment->locatie = $request->locatie;
        // assign other fields here

        $eveniment->organizator_id = Auth::guard('organizatori')->id();
        $eveniment->save();

        return redirect()->route('admin.dashboard');
    }


    public function edit(Eveniment $event)
    {
        if ($event->organizator_id != Auth::guard('organizatori')->id()) {
            return redirect()->route('admin.dashboard')->with('error', 'You are not authorized to edit this event.');
        }
        return view('organizator.events.edit', compact('event'));
    }

    public function update(Request $request, Eveniment $event)
    {
        if ($event->organizator_id != Auth::guard('organizatori')->id()) {
            return redirect()->route('admin.dashboard')->with('error', 'You are not authorized to update this event.');
        }
        $eveniment = Eveniment::findOrFail($event->id);
        $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
            'data_inceput' => 'required',
            'data_sfarsit' => 'required',
            'locatie' => 'required',
            // validate other fields here
        ]);

        $eveniment->titlu = $request->titlu;
        $eveniment->descriere = $request->descriere;
        $eveniment->data_inceput = $request->data_inceput;
        $eveniment->data_sfarsit = $request->data_sfarsit;
        $eveniment->locatie = $request->locatie;


        $eveniment->update();

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Eveniment $event)
    {
        if ($event->organizator_id != Auth::guard('organizatori')->id()) {
            return redirect()->route('admin.dashboard')->with('error', 'You are not authorized to delete this event.');
        }
        $event->delete();

        return redirect()->route('admin.dashboard');
    }
}