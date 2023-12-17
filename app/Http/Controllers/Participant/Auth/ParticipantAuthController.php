<?php

namespace App\Http\Controllers\Participant\Auth;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ParticipantAuthController extends Controller
{
    public function index()
    {
        return view('participant.auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::guard('participanti')->attempt($credentials)) {
            return redirect()->intended('participant/dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("participant/login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('participant.auth.register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:participanti',
            'nume' => 'required',
            'prenume' => 'required',
            'email' => 'required|email|unique:participanti',
            'telefon' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return Participant::create([
            'username' => $data['username'],
            'nume' => $data['nume'],
            'prenume' => $data['prenume'],
            'email' => $data['email'],
            'telefon' => $data['telefon'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        return view('participant.dashboard', compact('events')); // Pass the events to the view
        return redirect("participant/login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('participant/login');
    }
}
