<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantAuthController extends Controller
{
    //
    protected function guard()
    {
        return Auth::guard('organizator');
    }

    public function showLoginForm()
    {
        return view('auth.login', ['url' => 'organizator']);
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/organizator/login');
    }

}
