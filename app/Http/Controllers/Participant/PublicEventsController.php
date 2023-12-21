<?php
namespace App\Http\Controllers\Participant;

use App\Models\Eveniment;
use App\Models\Organizator;
use App\Http\Controllers\Controller;
use App\Models\Colaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicEventsController extends Controller
{
     public function index()
    {
        $events = Eveniment::all();
        return view('participant.events', compact('events'));
    }
    public function event($id)
    {
        $event = Eveniment::with('speakeri')->find($id);

        return view('participant.event_summary', ['event' => $event]);
    }
    public function organizator($id)
    {
        $organizator = Organizator::with('events')->find($id);
        return view('participant.organizator', ['organizator' => $organizator]);
    }
    public function colaborator($id)
    {
        $colaborator = Colaborator::with('evenimente')->find($id);
        return view('participant.colaborator', ['colaborator' => $colaborator]);
    }
}