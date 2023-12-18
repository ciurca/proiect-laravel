<?php
namespace App\Http\Controllers\Admin;

use App\Models\Bilet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Eveniment;
use Illuminate\Http\Request;

class BiletController extends Controller
{
    public function index()
    {
        $bilete = Bilet::all();
        return view('organizator.bilet.index', compact('bilete'));
    }

    public function create()
    {
        $events = Eveniment::all();
        if (Auth::guard('organizatori')->user()) {
            return view('organizator.Bilet.create', compact('events'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function store(Request $request)
    {
        if (Auth::guard('organizatori')->user()) {
            $Bilet = new Bilet($request->all());
            $Bilet->save();
            return redirect()->route('admin.bilet.index');
        } else {
            return redirect()->route('admin.login');
        }
    }


    # Editarea Biletelor
    public function edit(Bilet $bilet)
    {
    
        $events = Eveniment::all();
        $BiletEvents = $bilet->eveniment;
        if (Auth::guard('organizatori')->user()) {
            return view('organizator.bilet.edit', compact('bilet', 'events', 'BiletEvents'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function update(Request $request, Bilet $Bilet)
    {

        if (Auth::guard('organizatori')->user()) {
            $Bilet->update($request->all());
            return redirect()->route('admin.bilet.index');
        } else {
            return redirect()->route('admin.login');
        }

    }

    public function destroy(Bilet $Bilet)
    {
        
        $Bilet->delete();
        return redirect()->route('admin.bilet.index');
    }
}
