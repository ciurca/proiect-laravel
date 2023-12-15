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
        $speakers = Speaker::where('created_by', Auth::guard('organizatori')->id())->get();
        if (Auth::guard('organizatori')->user()) {
            return view('organizator.speakers.index', compact('speakers'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function create()
    {
        $events = Eveniment::all();
        if (Auth::guard('organizatori')->user()) {
            return view('organizator.speakers.create', compact('events'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function store(Request $request)
    {
        if (Auth::guard('organizatori')->user()) {
            $speaker = new Speaker($request->all());
            $speaker->created_by = Auth::guard('organizatori')->id();
            $speaker->save();
            return redirect()->route('admin.speakers.index');
        } else {
            return redirect()->route('admin.login');
        }
    }


    # Editarea speakerilor
    public function edit(Speaker $speaker)
    {
        if ($speaker->created_by!= Auth::guard('organizatori')->id()) {
            return redirect()->route('admin.dashboard')->with('error', 'You are not authorized to delete this speaker.');
        }
        $events = Eveniment::all();
        $speakerEvents = $speaker->evenimente;
        if (Auth::guard('organizatori')->user()) {
            return view('organizator.speakers.edit', compact('speaker', 'events', 'speakerEvents'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function update(Request $request, Speaker $speaker)
    {

        if (Auth::guard('organizatori')->user()) {
            $speaker->update($request->all());
            return redirect()->route('admin.speakers.index');
        } else {
            return redirect()->route('admin.login');
        }

    }

    public function destroy(Speaker $speaker)
    {
        // verifica daca organizatorul care a creat speakerul este cel care incearca sa il stearga
        if ($speaker->created_by!= Auth::guard('organizatori')->id()) {
            return redirect()->route('admin.dashboard')->with('error', 'You are not authorized to delete this speaker.');
        }
        $speaker->delete();
        return redirect()->route('admin.speakers.index');
    }
}