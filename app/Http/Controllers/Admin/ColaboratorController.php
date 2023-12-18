<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Colaborator;
use App\Models\Eveniment;
use Illuminate\Http\Request;

class ColaboratorController extends Controller
{
    public function index()
    {
    $colaboratori = Colaborator::all();

    if (Auth::guard('organizatori')->user()){
        return view('organizator.colaborator.index', compact('colaboratori'));
     }
    else {
        return redirect()->route('admin.login');
    }
    }


    public function create()
    {
        $events = Eveniment::all();

        if (Auth::guard('organizatori')->user()) {
            return view('organizator.colaborator.create', compact('events'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function store(Request $request)
    {
        if (Auth::guard('organizatori')->user()) {
            $colaborator = new Colaborator($request->all());
            $colaborator->save();
            return redirect()->route('admin.colaborator.index');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function edit(Colaborator $colaborator)
    {
        if (Auth::guard('organizatori')->user()) {
            $events = Eveniment::all();
           //$colaboratorEvents = $colaborator->evenimente; // Make sure 'evenimente' relationship is defined in Colaborator model
           return view('organizator.colaborator.edit', compact('colaborator', 'events'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function update(Request $request, Colaborator $colaborator)
    {
        if (Auth::guard('organizatori')->user()) {
            $colaborator->update($request->all());
            return redirect()->route('admin.colaborator.index');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function destroy(Colaborator $colaborator)
    {
        if (Auth::guard('organizatori')->user()) {
            $colaborator->delete();
            return redirect()->route('admin.colaborator.index');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
