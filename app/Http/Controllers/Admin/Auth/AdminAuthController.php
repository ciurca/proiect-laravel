<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organizator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('organizator.auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::guard('organizatori')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("admin/login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('organizator.auth.register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:organizatori',
            'email' => 'required|email|unique:organizatori',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return Organizator::create([
            'nume' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if(Auth::guard('organizatori')->check()){
            $organizator = Auth::guard('organizatori')->user();
            $events = $organizator->events; // Retrieve the events using the defined relationship

            return view('organizator.dashboard', compact('events')); // Pass the events to the view
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('admin/login');
    }
}
