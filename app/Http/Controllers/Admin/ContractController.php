<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Colaborator;
use App\Models\Eveniment;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $colaboratori = Colaborator::all();
        return view('organizator.colaborator.contract', compact('colaboratori'));
    }

    public function create()
    {
        $userId = Auth::guard('organizatori')->id();
        $events = Eveniment::where('organizator_id', $userId)->get();
        $colaboratori = Colaborator::all();
        return view('organizator.colaborator.create_contract', compact('events', 'colaboratori'));
    }

    public function store(Request $request)
    {
        $colaboratorId = $request->get('colaborator_id');
        $eventId = $request->get('event_id');

        $colaborator = Colaborator::find($colaboratorId);

        if ($colaborator) {
            $colaborator->evenimente()->attach($eventId);
        }

        return redirect()->route('admin.contract.index');
    }
    // public function edit($id)
    // {
    //     if (Auth::guard('organizatori')->user()) {
    //         $events = Eveniment::all();
    //        // $colaboratorEvents = $colaborator->evenimente; // Make sure 'evenimente' relationship is defined in Colaborator model
    //         return view('organizator.colaborator.edit', compact('events'));
    //     } else {
    //         return redirect()->route('admin.login');
    //     }
    // }
    public function edit($id)
    {
        $userId = Auth::guard('organizatori')->id();
        $events = Eveniment::all();

        $colaborator = Colaborator::whereHas('evenimente', function ($query) use ($id) {
            $query->where('contracts.id', $id);
        })->first();
    

        if (!$colaborator) {
            return redirect()->route('admin.contract.index');
        }

        return view('organizator.colaborator.edit_contract', compact('events', 'colaborator'));
    }

    public function update(Request $request, $id)
    {
        $colaboratorId = $request->get('colaborator_id');
        $eventId = $request->get('event_id');

        $colaborator = Colaborator::find($colaboratorId);

        if ($colaborator) {
            $colaborator->evenimente()->sync([$eventId]);
        }

        return redirect()->route('admin.contract.index');
    }


    public function destroy($id)
    {
        $eventId = request()->input('event_id');
        Eveniment::find($eventId)->colaboratori()->wherePivot('id','=',$id)->detach();

        return redirect()->route('admin.contract.index')->with('success', 'Contract deleted successfully.');
    }
}
